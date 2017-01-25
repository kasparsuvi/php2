<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 24.01.2017
 * Time: 21:44
 */

echo 'default fail sisu<br />';

$page_id = $http->get('page_id'); //get page_id from url
//get page content from database according to page_id
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'";';
//query to database
$res = $db->getArray($sql);
//if query is with result;

if($res !== FALSE){
    //control result test output
    echo '<pre>';
    print_r($res);
    echo '</pre>';
}

?>