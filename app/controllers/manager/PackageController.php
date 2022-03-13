<?php 

require_once "vendor/Controller.php";
require_once "app/models/Packege.php";

class PackageController extends Controller
{
  public function actionIndex ()
  {
    $packages = Package::findAll();
    $this->render("manager/package/index", array(
      "packages" => $packages
    ));
  }
  public function ActionView ($data)
  {
    if (isset($data["id"])) {
      $package = Package::find($data["id"]);
      $this->render("manager/package/view", array(
        "package" => $package
      ));
    }
  }
  public function ActionCreate () 
  {
    $package = new Package();

    if (!empty($_POST)) {
      if ($package->load($_POST) && $package->save()) {
        header("Location:?id=".$package->id);
      }
    }

    $this->render("manager/package/create");
  }
  public function ActionUpdate ($data) 
  {
    if (isset($data["id"])) {
      $package = Package::find($data["id"]);
      
      $this->render("manager/package/update", array(
        "package" => $package
      ));
    }

  }
}
