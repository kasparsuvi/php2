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
define('DEFAULT_ACT', 'default'); // default act file name

require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class
require_once CLASSES_DIR.'mysql.php'; // import database class
require_once 'db_conf.php'; // import database configuration
require_once 'acts/default.php';//import default act

// create http object from linkobject class
$http = new linkobject();
// create database object
$db = new mysql(DBHOST,DBUSER,DBPASS,DBNAME);
?>