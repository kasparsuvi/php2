<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 2/6/2017
 * Time: 12:18 PM


$users = new template('admin.kasutajad'); // in admin directory is file kasutajad.html admin/kasutajad.html
$users->set('users', false);
$user = new template('admin.kasutaja');

$sql = "SELECT * FROM user";
$res = $db->getArray($sql);

if($res != false ){
    foreach ($res as $user){
        //add content to user item
        $user->set('user_id',tr($user['user_id']));
        $user->set('username',tr($user['username']));
        $user->set('password',tr($user['password']));
        $user->set('first_name',tr($user['first_name']));
        $user->set('last_name',tr($user['last_name']));
        $user->set('e_mail',tr($user['e_mail']));
        $user->set('is_active',tr($user['is_active']));
        $user->set('role_id',tr($user['role_id']));
        $user->set('created',tr($user['created']));
        $users->set('users',$users->parse());
    }
}

*/
$tmpl->set('content','Siia tuleb kasutajate redigeerimine');
?>