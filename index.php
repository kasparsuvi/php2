<?php
// index.php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 12.01.2017
 * Time: 12:58
 */
// import configuration
require_once 'conf.php';
// create an template object,
// set up the file name for template
// load template file content
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');
// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());
$tmpl->set('nav_bar', $sess->user_data['username']);
$tmpl->set('lang_bar', LANG_ID);
$tmpl->set('content', $form->parse());
// output template content set up with real values
echo $tmpl->parse();
// control actions
// import act file
require_once 'act.php';
// control database object
// create test query
$sess ->flush();
// control database query result
echo '<pre>';
print_r($res);
echo '</pre>';
// query time control
$db->showHistory();
// control session output
echo '<pre>';
print_r($sess);
echo '</pre>';
$sess->clearSession();
?>
