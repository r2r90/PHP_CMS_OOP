<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
const VIEW_PATH = ROOT_PATH . 'view' . DIRECTORY_SEPARATOR;
const MODULE_PATH = ROOT_PATH . 'modules' . DIRECTORY_SEPARATOR;


require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once MODULE_PATH . 'page/models/Page.php';


/* Database Connection */
$dbName = getenv('MYSQL_DATABASE');
$dbHost = getenv('MYSQL_HOST');
$user = getenv('MYSQL_ADMIN_USERNAME');
$pass = getenv('MYSQL_ADMIN_PASSWORD');
DatabaseConnection::connect($dbHost, $dbName, $user, $pass);
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();


/* Routing */
// if / else logic

$section = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'dashboard') {

    include MODULE_PATH . 'dashboard/admin/controllers/DashboardController.php';

    $dashboardController = new DashboardController();
    $dashboardController->runAction($action);
}