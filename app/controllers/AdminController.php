<?php 

require_once "vendor/Controller.php";
require_once "app/models/Worker.php";

class AdminController extends Controller
{
  public function __construct ()
  {
    if (!Worker::verifyPermissions()) {
      header("Location:login");
    }
  }
}
