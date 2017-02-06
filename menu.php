<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 8:48 PM
 */
// menu.php - create page menu
// create menu template objects
// for menu and menu itmes
$menu = new template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$menu->set('items', false);
$item = new template('menu.item');
// menu item creation - begin
// main menu content query
$sql = 'SELECT content_id, title FROM content where '.
    'parent_id="0" and show_in_menu="1"';
if (ROLE_ID != ROLE_ADMIN) {
    $sql .= ' AND is_hidden = 0';
}
$sql = $sql.' order by sort ASC';
//get menu data from database
$res = $db->getArray($sql);
//create menu items from query result
if($res != false ){
    foreach ($res as $page){
        //add content to menu item
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link',$link);
        $item->set('name', tr($page['title']));
        $menu->add('items',$item->parse());
    }
}

$tmpl->set('menu',$menu->parse());

// add pairs of item temlate element names and real values
$item->set('name', tr('Esimene leht'));
$link = $http->getLink(array('act'=>'first'));
$item->set('link', $link);
$menu->set('items', $item->parse());

$item->set('name', tr('Teine leht'));
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);
$menu->add('items', $item->parse()); // add another item to menu

if(USER_ID != ROLE_NONE){

    $item->set('name', tr('administreeri'));
    $link = $http->getLink(array('act' => 'admin'));
    $item->set('link', $link);
    $menu->add('items', $item->parse()); // add another item to menu


    $item->set('name', tr('logi välja'));
    $link = $http->getLink(array('act' => 'logout'));
    $item->set('link', $link);
    $menu->add('items', $item->parse()); // add another item to menu
}



?>