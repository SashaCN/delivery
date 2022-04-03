<?php 

require_once "vendor/Controller.php";
require_once "app/models/User.php";

class AunthController extends Controller
{
  public function actionRegistr ()
  {
    $user = new User();

    if (!empty($_POST)) {
      if ($user->load($_POST) && $user->save()) {
        return $this->render("messages/success", array(
          'message' => 'Регистрация успешна!'
        ));
      }
    }
    
    $this->render('user/registr', array(
      'user' => $user
    ));
  }
  public function actionLogin ()
  {
    $user = new User();
     
    if (!empty($_POST)) {
      $user->load($_POST);
      if ($user->login()) {
        header("Location:index.php");
      } else {
        echo "<p class='error'><b>Упс, что-то пошло не так! Проверьте правильность веденной информации</b></p>";
        $this->render('user/login', array(
          'user' => $user
        ));
      }
    } else {
      $this->render('user/login', array(
        'user' => $user
      ));
    }


  }
  public function actionLogout ()
  {
    $user = new User();
    if ($user->logout()) {
      header("Location:index.php");
    }
  }
}