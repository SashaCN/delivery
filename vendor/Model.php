<?php 

class Model 
{

  public $error = array();

  public function load($data)
  {
    foreach ($data as $key => $value) {
      $nameMethod = 'set'.ucfirst($key);
      if (method_exists($this, $nameMethod)) {
        $this->$nameMethod($value);
      } else {
        if (property_exists($this, $key)) {
          $this->$key = $value; 
        }
      }
    }

    if (empty($this->error)) {
      return true;
    }
    return false;
  }
}