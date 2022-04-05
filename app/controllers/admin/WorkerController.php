<?php 

require_once "app/controllers/AdminController.php";
require_once "app/models/Worker.php";


class WorkerController extends AdminController
{
  public function __construct ()
  {
    parent::__construct();
    if (!Worker::aunthIsAdmin()) {
      header("Location:index.php");
    }

  }

  

  public function actionCreate ()
  {
    echo "create";
  }
}