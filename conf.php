<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/25/2017
 * Time: 6:15 PM
 */
// framework configuration
// create and template object
define('CLASSES_DIR', 'classes/'); // classes path
define('TMPL_DIR', 'tmpl/'); // templates path
define('STYLE_DIR', 'css/'); // styles path
define('ACTS_DIR', 'acts/'); // acts path
define('LIB_DIR', 'lib/'); // lib path
define('DEFAULT_ACT', 'default'); // default act file name

// user roles
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);

//define default language
define('DEFAULT_LANG','et');

// import useful functions
require_once LIB_DIR.'utils.php';

require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class
require_once CLASSES_DIR.'mysql.php'; // import database class
require_once CLASSES_DIR.'session.php'; // import session class
require_once 'db_conf.php'; // import database configuration

// create and output http object from linkobject class
$http = new linkobject();

// create database object
$db = new mysql(DBHOST,DBUSER,DBPASS,DBNAME);

// create session object
$sess = new session($http, $db);
$tmpl = new template('main');

//language support
$lang_id = DEFAULT_LANG;
$http->set('lang_id',$lang_id);

require_once ACTS_DIR.'login.php'; // import login act
?>
