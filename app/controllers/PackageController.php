<?php 

require_once "vendor/Controller.php";
require_once "app/models/Packege.php";

class PackageController extends Controller
{
  public function ActionView ($data)
  {
    if (isset($data["id"])) {
      $package = Package::find($data["id"]);
      $this->render("package/view", array(
        "package" => $package
      ));
    }
  }
  
}
