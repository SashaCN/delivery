<?php 

require_once "vendor/Db.php";

class UserPackage 
{
  static function findAll (int $id)
  {
    $pdo = Db::connection();

    $stmt = $pdo->prepare('SELECT * FROM package WHERE User_id_from = ?');

    $stmt->execute([$id]);

    $packages = array();

    while ($item = $stmt->fetch()) {
      $packages[] = $item;
    }
    return $packages;
  }
}