<?php 

require_once "app/config/routes.php";
require_once "vendor/Route.php";

session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
  require_once "resourse/views/user/cabinet.php";
} else {
  require_once "main.php";
}


$route = new \vendor\Route;
$route->start();

?>

<script src="resourse/js/adminAunth.js"></script>