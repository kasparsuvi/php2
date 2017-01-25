<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 8:48 PM
 */
require_once 'conf.php';
require_once 'index.php';
// menu.php - create page menu
// create menu template objects
// for menu and menu itmes
$menu = new template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$item = new template('menu.item');

/*
// menu item creation - begin
// add pairs of item temlate element names and real values
$item->set('name', 'Esimene leht');
$link = $http->getLink(array('act'=>'first'));
$item->set('link', $link);

// add menu item to menu
$menu->set('items', $item->parse());
// menu item creation - end
//
// menu item creation - begin
// add pairs of item template element names and real values
$item->set('name', 'Teine leht');
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);

// add menu item to menu
$menu->add('items', $item->parse()); // add another item to menu
// menu item creation - end
//*/


//main menu content query
$sql = 'SELECT content_id, title FROM content WHERE parent_id="0" AND show_in_menu="1" ORDER BY sort ASC;';

//get menu data from database
$res = $db->getArray($sql);
//create menu items from query result
if($res != false){
    foreach ($res as $page){
        //add content to menu item
        $item->set('name',$page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link',$link);
        //add item to menu
        $menu->add('items',$item->parse());
    }
}
$tmpl->set('menu',$menu->parse());
?>