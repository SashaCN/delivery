<?php 

class Controller 
{
  protected function render(string $template,array $data = array())
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      require_once "resourse/views/$template.php";
    }
}