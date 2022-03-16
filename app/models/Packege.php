<?php 

require_once "vendor/Db.php";
require_once "vendor/Model.php";

class Package extends Model
{
  public $type;
  public $date; 
  public $user_from;
  public $address_to;
  public $status;
  public $manager;
  public $address_from;

  public function setType($type)
  {
    if (!is_nan($type)) {
      $this->type = $type;
      return true;
    }
    $this->error['type'] = 'Поле Тип не должно быть пустым и должно быть числом';
  }

  public function setDate($date)
  {
    if ($date !== '') {
      $this->date = $date;
      return true;
    }
    $this->error['date'] = 'Поле Дата не должно быть пустым';
  }
  
  public function setUser_from($user_from)
  {
    if (!is_nan($user_from)) {
      $this->user_from = $user_from;
      return true;
    }
    $this->error['user_from'] = 'Поле Отправителя не должно быть пустым и должно быть числом';
  }

  public function setAddress_to($address_to)
  {
    if (!is_nan($address_to)) {
      $this->address_to = $address_to;
      return true;
    }
    $this->error['address_to'] = 'Поле Адреса получателя не должно быть пустым и должно быть числом';
  }
  
  public function setStatus($status)
  {
    if ($status !== '') {
      $this->status = $status;
      return true;
    }
    $this->error['status'] = 'Поле Статуса не должно быть пустым';
  }

  public function setManager($manager)
  {
    if (!is_nan($manager)) {
      $this->manager = $manager;
      return true;
    }
    $this->error['manager'] = 'Поле Менеджера не должно быть пустым и должно быть числом';
  }

  public function setAddress_from($address_from)
  {
    if (!is_nan($address_from)) {
      $this->address_from = $address_from;
      return true;
    }
    $this->error['address_from'] = 'Поле Адреса отправителя не должно быть пустым и должно быть числом';
  }

  static function find (int $id)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM package WHERE Pack_id = ?');

    $stmt->execute([$id]);

    $item = $stmt->fetch();

    return $item;
  }

  static function findAll ()
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM package');

    $stmt->execute();

    $packages = array();

    while ($item = $stmt->fetch()) {
      $packages[] = $item;
    }
    return $packages;
  }
  public function save ()
  {
    $data = array(
      'pack_type' => $this->type,
      'date_add' => $this->date,
      'user_from' => $this->user_from,
      'address_to' => $this->address_to,
      'pack_status' => $this->status,
      'manager' => $this->manager,
      'address_from' => $this->address_from,
    );
    if (!empty($this->id)) {
      $data['pack_id'] = $this->id;
      $sql = 'UPDATE `package` SET `Pack_type_id`=:pack_type,`Created_at`=:date_add,`User_id_from`=:user_from,`Address_id`=:address_to,`Status`=:pack_status,`Manager_id`=:manager,`Address_from`=:address_from WHERE `Pack_id` = :pack_id';
    } else {
      $sql = 'INSERT INTO package (`pack_type_id`, `created_at`, `User_id_from`, `Address_id`, `Status`, `Manager_id`, `Address_from`) VALUES (:pack_type, :date_add, :user_from, :address_to, :pack_status, :manager, :address_from)';
    }

    $pdo = Db::connection(); 

    $stmt = $pdo->prepare($sql);

    

    $stmt->execute($data);
    $this->id = $pdo->lastInsertId();

    return true;
  }
}