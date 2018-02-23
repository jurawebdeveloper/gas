<?php

spl_autoload_register(function ($class){
    $pastas = ['daos', 'models'];
      foreach ($pastas as $pasta) {
      if(file_exists('classes/' . $pasta . '/' . $class . '.php'))
      include 'classes/' . $pasta . '/' . $class . '.php';
    }
 });
?>