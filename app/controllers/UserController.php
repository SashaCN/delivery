<?php

// class UserController
// {
//   public function logIn()
//   {
    
//   }
//   public function logOut()
//   {

//   }
//   public function registr()
//   {

//   }
// }

require_once "vendor/Controller.php";
require_once "app/models/User.php";

class  UserController extends Controller
{
  public function actionIndex ()
  {
    $users = User::findAll();
    $this->render("user/index", array(
      "users" => $users
    ));
  }
  public function actionView ($data)
  {
    if (isset($data["id"])) {
      $user = User::find($data["id"]);
      $this->render("user/view", array(
        "user" => $user
      ));
    }
  }
  public function actionProfile ($data)
  {
    return $this->render("user/profile", array(
    
    ));
  }
}
