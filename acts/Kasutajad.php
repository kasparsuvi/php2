<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 2/6/2017
 * Time: 12:18 PM

 */
$users = new template('admin.kasutajad'); // in admin directory is file kasutajad.html admin/kasutajad.html
$users->set('users', false);
$user = new template('admin.kasutaja');

$sql = "SELECT * FROM user";
$res = $db->getArray($sql);

if($res != false ){
    foreach ($res as $key=>$userdata){
        //add content to user item
        $user->set('user_id',tr($userdata['user_id']));
        $user->set('username',tr($userdata['username']));
        $user->set('password',tr($userdata['password']));
        $user->set('first_name',tr($userdata['first_name']));
        $user->set('last_name',tr($userdata['last_name']));
        $user->set('e_mail',tr($userdata['email']));
        $user->set('is_active',tr($userdata['is_active']));
        $user->set('role_id',tr($userdata['role_id']));
        $user->set('created',tr($userdata['created']));
        $users->add('users',$user->parse());
    }
}
$link = $http->getLink(array('act' => 'add_user'));
$users->set('action', $link);

$users->set('button',tr("Uus kasutaja"));
$tmpl ->set('content',$users->parse());
?>