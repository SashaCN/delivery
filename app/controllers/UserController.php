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
  public function ActionView ($data)
  {
    echo "<pre>";
    if (isset($data["user_id"])) {
      $user = User::find($data["user_id"]);
      $this->render("user/view", array(
        "user" => $user
      ));
    }
  }
}
