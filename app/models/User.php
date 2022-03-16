<?php 

require_once "vendor/Db.php";
require_once "vendor/Model.php";

class User extends Model
{
  public $id;
  public $phone;
  public $name;
  public $password;
  public $default_address;


  // public function setPhone ($phone)
  // {
  //   $user = $this->findUserByPhone($phone);
  //   if (!empty($user)) {
  //     $this->error['phone'] = "Phone number has been already exists";
  //   } else {
  //     // if () - проверка телефона регуляркой
  //     $this->phone = $phone;
  //   }
  // }

  private function findUserByPhone ($phone)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM user WHERE Phone = ?');

    $stmt->execute([$phone]);

    $item = $stmt->fetch();

    return $item;
  }
  
  static function find (int $id)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM user WHERE User_id = ?');

    $stmt->execute([$id]);

    $item = $stmt->fetch();

    return $item;
  }

  static function findAll ()
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM user');

    $stmt->execute();

    $users = array();

    while ($item = $stmt->fetch()) {
      $users[] = $item;
    }
    return $users;
  }

  public function save () 
  {
    $pdo = Db::connection(); 

    $stmt = $pdo->prepare('INSERT INTO user (`Phone`, `Default_address`, `User_name`, `Password`) VALUES (:phone, :default_address, :name_user, :user_password)');

    $data = array(
      'phone' => $this->phone,
      'default_address' => $this->default_address,
      'name_user' => $this->name,
      'user_password' => md5($this->password),
    );

    $stmt->execute($data);
    $this->id = $pdo->lastInsertId();

    return true;
  }

  public function login ()
  {
    $user = $this->findUserByPhone($this->phone);
    if (empty($user)) {
      return false;
    }
    if (md5($this->password) != $user['Password']) {
      return false;
    }
    session_start();
    $_SESSION["user"] = $user['User_name'];
    return true;
  }
}