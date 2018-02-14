<?php
    
    function carregaClasse($nomeDaClasse) {  
      $pastas = ['daos', 'models'];
      foreach ($pastas as $pasta) {
        $arquivo = "classes/{$pasta}/{$nomeDaClasse}";
        if(file_exists($arquivo)){
          require_once($arquivo);
        }
      }
    }
    spl_autoload_register("carregaClasse");
?>