<?php

require_once 'src/Controller.php';
session_start();

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'about') {
    include 'controller/about-us.controller.php';
    $aboutUsController = new AboutUsController();
    $aboutUsController->runAction($action);
} else if ($section == 'contact') {
    include 'controller/contact-us.controller.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {
    include 'controller/home-page.controller.php';
}