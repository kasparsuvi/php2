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
// add pairs of item temlate element names and real values
$item->set('name', 'Esimene leht');
$link = $http->getLink('page'=>'first');
$item->set('link', $link);
// control created item output
echo '<pre>';
print_r($item);
echo '</pre>';
?>