<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
const VIEW_PATH = ROOT_PATH . 'view' . DIRECTORY_SEPARATOR;


require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';


$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'about') {
    include ROOT_PATH . 'controller/about-us.controller.php';
    $aboutUsController = new AboutUsController();
    $aboutUsController->runAction($action);
} else if ($section == 'contact') {
    include ROOT_PATH . 'controller/contact-us.controller.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {
    include ROOT_PATH . 'controller/home-page.controller.php';
    $homePageController = new HomePageController();
    $homePageController->runAction($action);
}