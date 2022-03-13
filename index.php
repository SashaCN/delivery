<?php 

require_once "app/config/routes.php";
require_once "vendor/Route.php";

$route = new \vendor\Route;
$route->start();


// $uri = trim($_SERVER['REQUEST_URI'], "/"); //"delivery/package/view?category=1&filter=2"

// $route_path = explode("?", $uri); //package/index.php
// // print_r($route_path);die;
// $data = array();

// if (isset($route_path[1])) {
//   $params = explode("&", $route_path[1]); // id=1
//   foreach ($params as $param) {
//     $exp = explode("=", $param);
//     $data[$exp[0]] = $exp[1];  //"id"=>1
//   }
// }


// if (isset($urlRoutes[$route_path[0]])) {
//   $rout_way = explode("/", $urlRoutes[$route_path[0]]);
  
//   $controller_name = $rout_way[0];
//   $action_name = $rout_way[1]; // если пусто - тогда index
  
//   $contr_name = ucfirst($controller_name)."Controller";
//   $contr_dir = "app/controllers/$contr_name.php";
  
  
  // if (file_exists($contr_dir)) {
  //   require_once $contr_dir;
  
  //   if (class_exists($contr_name)) {
  //     $controller = new $contr_name();
  //     $action = "action".ucfirst($action_name);
  
  //     if (method_exists($controller, $action)) {
  //       $controller->$action($data);
  //     } else {
  //       $controller->actionIndex();
  //     }
  
  //   } else {
  //     die; 
  //     echo "class doesn`t exists";
  //   }
  // }
// } else {
//   echo 'nou';
//   // header('location:index.php');
// }




// $controller