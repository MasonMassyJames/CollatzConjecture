<?php 

require_once dirname(__DIR__) . "/include/bootstrap.php";

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri );

$req = new MainController();
$req->bootstrap($uri);