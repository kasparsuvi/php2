<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 2/6/2017
 * Time: 12:18 PM
 */

$users = new Template('admin.kasutajad');

$tmpl->set('content',$users->parse());

?>