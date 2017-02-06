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

//require language control
require_once ('lang.php');

// add pairs of template element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');

// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());

// import act file
require_once 'act.php';

$tmpl->set('nav_bar', $sess->user_data['username']);

//$tmpl->set('lang_bar', LANG_ID);
$tmpl->set('content', $form->parse());
// output template content set up with real values
echo $tmpl->parse();
// control actions

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
