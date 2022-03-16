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
  public function actionView ($data)
  {
    if (isset($data["id"])) {
      $package = Package::find($data["id"]);
      $this->render("manager/package/view", array(
        "package" => $package
      ));
    }
  }
  public function actionCreate () 
  {
    $package = new Package();

    if (!empty($_POST)) {
      if ($package->load($_POST) && $package->save()) {
        header("Location:?id=".$package->id);
      }
    }

    $this->render("manager/package/create");
  }
  public function actionUpdate ($data) 
  {
    if (isset($data["id"])) {
      $package = Package::find($data["id"]);
      
      if (!empty($_POST)) {
        $package = new Package();
        $package->load($_POST);
        $package->id = $data["id"];
        if (empty($package->error)) {
          $package->save();
        }
      }

      $this->render("manager/package/update", array(
        "package" => $package
      ));
    }
  }
}
