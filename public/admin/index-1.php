<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
const VIEW_PATH = ROOT_PATH . 'view' . DIRECTORY_SEPARATOR;
const MODULE_PATH = ROOT_PATH . 'modules' . DIRECTORY_SEPARATOR;

// THIS SHOULD NOT BE THERE!!!  IS WRONG WAY JUST FOR TESTING !!!
const ENCRYPTION_SALT = 'qsjhsd6jqs7shd67bns21ssdpmweza783';


require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Rules.php';
require_once ROOT_PATH . 'src/Validator.php';
require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once ROOT_PATH . 'src/Template.php';
require_once MODULE_PATH . 'page/models/Page.php';
require_once MODULE_PATH . 'user/models/User.php';


/* Database Connection */
$dbName = getenv('MYSQL_DATABASE');
$dbHost = getenv('MYSQL_HOST');
$user = getenv('MYSQL_ADMIN_USERNAME');
$pass = getenv('MYSQL_ADMIN_PASSWORD');
DatabaseConnection::connect($dbHost, $dbName, $user, $pass);
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$userObj = new User($dbc);

$userObj->findBy('username', 'admin');

$authObj = new Auth();
$rules = new Rules();
$validator = new Validator($rules);

$userObj = $authObj->changeUserPassword($userObj, 'TopSecret$');
var_dump($userObj);
