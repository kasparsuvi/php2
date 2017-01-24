<?php

/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 1:42 PM
 */
// allow to use text class in ctext class
require_once('text.php');
class ctext extends text

class ctext{// ctext begin
	// class variable
	var $color = false;
	// methods
	// set color
    function setColor($c){
        		$this->color = $c;
        	}// setColor

	// show color text - overrided text class function
	function show(){
 		// if color is not set - use black and white output
 		if($this->color === false){
 			parent::show(); // use text class show function
 		}else {
    			// if color is set - use color output
    			echo '<font color="'.$this->color.'">'.$this->str.'</font><br/>';
 		}
 	}// show
 }// ctext end
?>