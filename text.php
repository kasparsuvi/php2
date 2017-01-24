<?php

/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 12:48 PM
 */
class text
{// text class begin
    // class variables = instance variables
    var $str = '';

    //constructor
    function __construct($s = ''){
        $this->setText($s);
    }//constructor

    // methods
    // set text function
    function setText($s){
        $this->str = $s;
    }// setText
    // show text function
    function show(){
        echo $this->str.'<br/>';
    }// show
}// text class end
?>
