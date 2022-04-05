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
        header("Location:index.php");
      } 
    }
    return $this->render('manager/aunth/login', array(
      'worker' => $worker
    ));


  }

  public function actionProfile ($data)
  {
    if (isset($data["id"])) {
      $worker = Worker::find($data["id"]);
      return $this->render("manager/worker-view", array(
        "worker" => $worker
      ));
    }
  }

  public function actionLogout ()
  {
    $worker = new Worker();
    if ($worker->logout()) {
      header("Location:../index.php");
    }
  }
}