<?php 

require_once "vendor/Controller.php";
require_once "app/models/UserPackage.php";

class ProfileController extends Controller 
{
  public function actionPackages ($data)
  {
    $packages = UserPackage::findAll($data["id"]);
    $this->render("profile/userPackage", array(
      "packages" => $packages
    ));
  }

  public function userPassword ()
  {

  }
  public function changeInfo ()
  {

  }
}