<?php 

require_once "vendor/Db.php";
require_once "vendor/Model.php";

class Worker extends Model
{

  const MANAGER = 2;
  const ADMIN = 1;
  const ROLES = array(
    self::MANAGER => 'Manager',
    self::ADMIN => 'Admin'
  );

  public $worker_id;
  public $name;
  public $login;
  public $password;
  public $department_id;


  private function findWorkerByLogin ($login)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM workers WHERE `login` = ?');

    $stmt->execute([$login]);

    $item = $stmt->fetch();

    return $item;
  }

  public function login ()
  {
    $worker = $this->findWorkerByLogin($this->login);
    if (empty($worker)) {
      return false;
    }
    if ($this->password != $worker['password']) {
      return false;
    }
    session_start();
    $_SESSION["worker"] = $worker['name'];
    $_SESSION["id"] = $worker['worker_id'];
    $_SESSION["role"] = $worker['role'];
    return true;
  }

  public static function verifyPermissions ()
  {
    session_start();
    
    if (!isset($_SESSION["worker"])){
      return false;
    }
    if (!isset($_SESSION["role"])){
      return false;
    }

    return $_SESSION["role"];
  }
  public static function aunthIsAdmin ()
  {
    session_start();
    
    if ($_SESSION["role"] == self::ADMIN) {
      return true;
    }
    return false;
  }
}