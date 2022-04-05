<?php

namespace vendor;

class Route
{
  private $uri;
  private $controller_name = 'Index';
  private $action_name = 'Index';
  private $params = array();
  private $rout;
  private $dir_controller = "app/controllers/";
  public function start(){
    // get string adress from server`s request
    $this->setUri();

    $this->setRout();
    //разбираем uri На парметры для переадресации
    
    $this->setRoutParam();      
    //переадресация на нужный контроллер екшен
    $this->redirect();
    // $this->setControllerName("name");
  }
  public function setUri()
  {
    $this->uri = trim($_SERVER['REQUEST_URI'], "/"); //"delivery/package/view?category=1&filter=2"
  }
  private function setRout ()
  {
    $this->rout = explode("?", $this->uri); //Array ( [0] => package-list [1] => id=1&category=2 )
  }
  private function setRoutParam()
  {
    global $urlRoutes;
    if (isset($urlRoutes[$this->rout[0]])) {
      $rout_way = explode("/", $urlRoutes[$this->rout[0]]); //Array ( [0] => package [1] => index )
      
      if ($rout_way[0] == "manager") {
        $this->dir_controller .= "manager/";
        array_shift($rout_way);
      } else if ($rout_way[0] == "admin"){
        $this->dir_controller .= "admin/";
        array_shift($rout_way);
      }

      if ($rout_way[0]) {
        $this->setControllerName($rout_way[0]);
      }
      if ($rout_way[1]) {
        $this->setActionName($rout_way[1]);
      }
    }
    if (isset($this->rout[1])) {
      $this->getParam($this->rout[1]);
    }
  }
  private function setControllerName($name)
  {
    $this->controller_name = ucfirst($name)."Controller";
  }
  private function setActionName($name)
  {
    $this->action_name = "action".ucfirst($name);
  }
  private function getParam($param_str)
  {
    $params = explode("&", $param_str); // id=1
    foreach ($params as $param) {
      $exp = explode("=", $param);
      $this->params[$exp[0]] = $exp[1];  //"id"=>1
    }
  }
  private function redirect()
  {
    $contr_dir = $this->dir_controller.$this->controller_name.".php";
    
    if (file_exists($contr_dir)) {
      require_once $contr_dir;
      // echo $contr_dir;die;
      if (class_exists($this->controller_name)) {
        $controller = new $this->controller_name();

        if (method_exists($controller, $this->action_name)) {
          $action = $this->action_name;
          $controller->$action($this->params);
        } else {
          $controller->actionIndex();
        }
    
      } else {
        echo "class doesn`t exists";
        die; 
      }
    }
  }
}