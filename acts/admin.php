<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 2/6/2017
 * Time: 11:57 AM
 */

$admin = new Template('admin.admin');

//SET kasutajad
$admin->set('name1','Kasutajad');
$link = $http->getLink(array('act'=>'Kasutajad'));
$admin->set('link1',$link);
//set lehed
$admin->set('name2','Lehed');
$link = $http->getLink(array('act'=>'Lehed'));
$admin->set('link2',$link);



$tmpl->set('content',$admin->parse());

?>