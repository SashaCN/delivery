<?php 

require_once "vendor/Controller.php";

class AunthController extends Controller
{
  public function actionRegistr ()
  {
    echo "hello";
    $this->render('user/registr');
  }
  public function actionLogin ()
  {

  }
  public function actionLogout ()
  {

  }
}