<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 26.01.2017
 * Time: 14:34
 */
class session
{// class begin
    // class variables
    var $sid = false;
    var $vars = array();
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;
    // class methods
    // construct
    function __construct(&$http, &$db){
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
        $this->checkSession();
    }// construct

    // set anonymous
    function setAnonymous($bool){
        $this->anonymous = $bool;
    }// set anonymous

    // setup timeout
    function setTimeout($t){
        $this->timeout = $t;
    }// timeout

    // create session
    function createSession($user = false){
        // anonymous session
        if($user == false){
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }
        // create session id number
        $sid = md5(uniqid(time().mt_rand(1,1000), true));
        // insert data to database
        $sql = 'INSERT INTO session SET '.
            'sid='.fixDb($sid).', '.
            'user_id='.fixDb($user['user_id']).', '.
            'user_data='.fixDb(serialize($user)).', '.
            'login_ip='.fixDb(REMOTE_ADDR).', '.
            'created=NOW()';
        $this->db->query($sql);
        //setup session id number
        $this->sid = $sid;
        $this->http->set('sid', $sid);
    }// createSession

    // delete session data from database
    function clearSession(){
        $sql = 'DELETE FROM session '.
            'WHERE '.
            time().'- UNIX_TIMESTAMP(changed) >'.
            $this->timeout;
        $this->db->query($sql);
    }

    // control session
    function checkSession(){
        $this->clearSession();
         if ($this->sid === false and $this->anonymous){
             $this->createSession();
         }
         if ($this->sid !== false){
             // get data about this session
             $sql = 'SELECT * FROM session WHERE '.
                 'sid='.fixDb($this->sid);
             $res = $this ->db->getArray($sql);
             if ($res == false){
                 if ($this->anonymous ) {
                     $this->createSession();
                 }else{
                     $this->sid = false;
                     $this->http->del('sid');
                 }
                 define('ROLE_ID', 0);
                 define('USER_ID', 0);
             }
             else{
                 $vars = unserialize($res[0]['svars']);
                 if (!is_array($vars)){
                     $vars = array();
                 }
                 $this->vars = $vars;
                 $user_data = unserialize($res[0]['user_data']);
                 define('ROLL_ID',$user_data['role_id']);
                 define('USER_ID',$user_data['user_id']);
                 $this->user_data = $user_data;
             }
         } else {
            define('ROLE_ID',0);
            define('USER_ID',0);
         }
    }//check session

    //delete session by request
    function deleteSession(){
        if($this->sid !== false){
            $sql = ' DELETE FROM session WHERE '.
                'sid='.fixDb($this->sid);
            $this->db->query($sql);
            $this->sid = false;
            $this->http->del('sid');
        }
    }//deleteSession

    function set($name, $val){
        $this->vars[$name] = $val;
    }// set
    // get element_value according to the element_name
    function get($name, $fix = true){
        // if element with such name is exists
        if(isset($this->vars[$name])){
            return $this->vars[$name];
        }
        // if element with such name is not exists
        return false;
    }// get

    //delete http data elemnt
    function del($name){
        if (isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }//del

    function flush(){
        if($this->sid !== false){
            $sql = 'UPDATE session SET changed=NOW(),'.
                'svars='.fixDb(serialize($this->vars)).
                ' WHERE sid='.fixDb($this->sid);
            $this->db->query($sql);
        }
    }

}// class end
?>