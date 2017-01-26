<?php

/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/26/2017
 * Time: 2:34 PM
 */
class session{ //session start
    //Class variables
    var $sid = false;
    var $vars = false;
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;

    // class methods
    // constructor
    function __construct(&$http , &$db){
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');

    }//construct

    //create session
    function createSession($user = false){
        //anonymous session
        if ($user == false){
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }
        // create session id
        $sid =md5(uniqid(time().mt_rand(1,1000), true));
        //insert data to database
        $sql = 'INSERT INTO session SET '.
            'sid='.fixDB($sid).', '.
            'user_id='.fixDB($user['user_id']).', '.
            'user_data='.fixDB(serialize($user)).','.
            'login_ip='.fixDB(REMOTE_ADDR).', '.
            'created=NOW()';

        $this->db->query($sql);

        // setup session id number
        $this->sid = $sid;
        $this->http->set('sid',$sid);


    }createSession

}// session end


?>