<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/26/2017
 * Time: 2:52 PM
 */

//useful function for sql and queris

function fixDB($val){
    return '"'.addslashes($val).'"';
}

?>