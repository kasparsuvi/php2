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

}// session end


?>