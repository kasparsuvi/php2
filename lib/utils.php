<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 26.01.2017
 * Time: 14:51
 */
// useful function for sql queries
function fixDb($val){
    return '"'.addslashes($val).'"';
}
?>
