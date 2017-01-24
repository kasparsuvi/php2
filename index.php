
<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 2:13 PM
 */
// create template object
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
require_once CLASSES_DIR.'template.php';
// and use it
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');

$tmpl->set('header', 'minu lehe pealkiri');

// import http class
require_once CLASSES_DIR.'http.php';
// import linkobject class
require_once CLASSES_DIR.'linkobject.php';
// create and output http object from linkobject class
$http = new linkobject();
// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());
$tmpl->set('nav_bar', 'minu navigatsioon');
$tmpl->set('lang_bar', 'minu keeleriba');
$tmpl->set('content', 'minu sisu');
// control the content of template object
/*echo '<pre>';
print_r($tmpl);
echo '</pre>';
*/
echo $tmpl->parse();

// import http class
require_once CLASSES_DIR.'http.php';
// import linkobject class
require_once CLASSES_DIR.'linkobject.php';
// create and output http object from linkobject class
$http = new linkobject();
// control http object output
/*echo '<pre>';
print_r($http);
echo '</pre>';*/
// control http constants
echo REMOTE_ADDR.'<br />';
echo PHP_SELF.'<br />';
echo SCRIPT_NAME.'<br />';
echo HTTP_HOST.'<br />';

echo '<hr />';
// create http data pairs and set up into $http->vars array
$http->set('kasutaja', 'Kaspar');
$http->set('tund', 'php programmeerimisvahendid järelaitamine kodus');
// control $http->vars object output
/*echo '<pre>';
print_r($http->vars);
echo '</pre>';*/

// control link creation
$link = $http->getLink(array('kasutaja'=>'anna', 'parool'=>'qwerty'));
echo $link.'<br />';
// control menu
// import menu file
require_once 'menu.php';
echo $link.'<br />';
// control http output
echo '<pre>';
print_r($http);
echo '</pre>';

?>