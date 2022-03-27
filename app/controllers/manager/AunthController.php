<?php

require_once "vendor/Controller.php";
require_once "app/models/Worker.php";

class AunthController extends Controller
{

  public function actionLogin ()
  {
    $worker = new Worker();
     
    if (!empty($_POST)) {
      $worker->load($_POST);
      if ($worker->login()) {
        return $this->render('message/success', array(
          'message' => "Hello admin"
        ));
        // header("Location:index.php");
      } 
    }
    return $this->render('manager/aunth/login', array(
      'worker' => $worker
    ));


  }
}