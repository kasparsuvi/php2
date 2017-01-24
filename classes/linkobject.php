<?php

/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 3:23 PM
 */
// useful function for this class
function fixUrl($val){
    	return urlencode($val);
}// fixUrl
// only for testing
// import http class
require_once 'http.php';
// only for testing
class linkobject extends http{// class begin
    // class variables
    var $baseUrl = false; // base url
 	var $protocol = 'http://'; // protocol for url - http
 	var $delim = '&amp;'; //& html tag name1=value1&name2=value2
 	var $eq = '='; // = for url element pair element_name=element_value
 	// class methods
 	// construct
 	// create base url: http://XXX.XXX.XXX.XXX/path_to_file.php
 	function __construct(){
        		parent::__construct();
        		$this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
        	}// construct
    // create http data pairs and merge them
	function addToLink($link, $name, $val){
    		// create pair: element_name=element_value
    		$link = $link.fixUrl($name).$this->eq.fixUrl($val);
    		echo $link;
 	}// addTo Link
 }// class end