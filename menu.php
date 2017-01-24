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
$item = new template('menu.item');
// menu item creation - begin
// add pairs of item temlate element names and real values
$item->set('name', 'Esimene leht');
$link = $http->getLink(array('act'=>'first'));
$item->set('link', $link);
// control created item output
/*echo '<pre>';
  print_r($item);
  echo '</pre>';*/
// add menu item to menu
$menu->set('items', $item->parse());
// menu item creation - end
//
// menu item creation - begin
// add pairs of item template element names and real values
$item->set('name', 'Teine leht');
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);
// control created item output
/*echo '<pre>';
print_r($item);
echo '</pre>';*/
// add menu item to menu
$menu->add('items', $item->parse()); // add another item to menu
// menu item creation - end
//
// control created menu output
/*echo '<pre>';
print_r($menu);
echo '</pre>';*/
// output menu
//echo $menu->parse();
?>