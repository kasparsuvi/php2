<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 9:23 PM
 */
// get act element value from url
$act = $http->get('act');
// define act file path according to the act element value
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
// output act file path
echo $fn.'<br />';
?>