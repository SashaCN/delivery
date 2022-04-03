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


  public function setPhone ($phone)
  {
    $user = $this->findUserByPhone($phone);
    if (!empty($user)) {
      $this->error['phone'] = "Аккаунт с таким номером уже существует!";
      return false;
    } else {
      if (!preg_match('#\(\d{3}\)\s\d{3}\-\d{4}#', $phone)) {
        $this->error['phone'] = "Номер телефона должен соответствовать схеме (ХХХ) ХХХ-ХХХХ";
        return false;
      }
      $this->phone = $phone;
      return true;
    }
  }

  public function setName ($name)
  {
    if (!preg_match('#([A-Z][a-z]+)\s([A-Z][a-z]+)#', $name)) {
      $this->error['name'] = "Имя должно соответствовать схеме Name Surname";
      return false;
    } 
    $this->name = $name; 
    return true;
  }

  public function setPassword($password)
  {
    if (!preg_match('#(?=\S{12,25})#', $password)) {
      $this->error['password'] = "Длина пароля должна находится в диапазоне от 12 до 25 символов";
      return false;
    }
    if (!preg_match('#(?=\S*[a-z])#', $password)) {
      $this->error['password'] = "Пароль должен содержать хотя бы одну маленькую букву";
      return false;
    }
    if (!preg_match('#(?=\S*[A-Z])#', $password)) {
      $this->error['password'] = "Пароль должен содержать хотя бы одну большую букву";
      return false;
    }
    if (!preg_match('#(?=\S*[\d])#', $password)) {
      $this->error['password'] = "Пароль должен содержать хотя бы одну цифру";
      return false;
    }
    $this->password = $password;
    return true;
  }

  private function findUserByPhone ($phone)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM user WHERE Phone = ?');

    $stmt->execute([$phone]);

    $item = $stmt->fetch();
    
    var_dump($item);die;
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
    // var_dump($user);die;
    if (empty($user)) {
      return false;
    }
    if (md5($this->password) != $user['Password']) {
      return false;
    }
    session_start();
    $_SESSION["user"] = $user['User_name'];
    $_SESSION["id"] = $user['User_id'];
    return true;
  }
  public function logout()
  {
    session_start();
    session_unset();
    return true;
  }
}