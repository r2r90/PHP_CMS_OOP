<?php

$section = $_GET['section'] ?? 'home';

if ($section == 'about-us') {
    include 'controller/about-us.controller.php';
} else if ($section == 'contact-us') {
    include 'controller/contact-us.controller.php';
} else {
    include 'controller/home-page.controller.php';
}
