<?php 

class Db 
{
  public static function connection()
  {
    $host = 'localhost';
    $db = 'delivery';
    $user = 'root';
    $password = '';
    $charset = 'utf8';
  
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;";
    $opt = [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES=>FALSE
    ];
  
    return new PDO($dsn, $user, $password, $opt);
  }
}