<?php 

require_once "vendor/Db.php";

class User 
{
  private $id;
  private $name;
  private $login;
  private $password;

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
}