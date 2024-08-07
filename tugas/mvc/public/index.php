<?php
require  '../app/controller/HomeController.php';
require '../app/models/User.php';

$controller = new HomeController();
$controller->index();
