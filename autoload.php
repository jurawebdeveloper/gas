<?php

spl_autoload_register(function ($class){
    $pastas = ['daos', 'models'];
      foreach ($pastas as $pasta) {
      include 'classes/' . $pasta . '/' . $class . '.php';
    }
 });
?>