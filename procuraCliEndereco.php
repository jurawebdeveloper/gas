<?php
    date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

    $cep = $_GET['cep'];
    $numero = $_GET['cep'];
    $clienteDAO= new ClienteDAO();

    $clientes = [];
    $consulta = $clienteDAO->listaCliEndereco($cep, $numero);
    
    foreach ($consulta as $key => $cons) {
      $clientes[] = $cons->getNome();
    }
    //print_r($clientes); exit;
    echo json_encode($clientes);
    ?>


