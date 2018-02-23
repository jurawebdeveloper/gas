<?php
    date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

    $digitaRua = $_GET['term'];
    $cepDAO= new CepDAO();

    $ruas = [];
    $consulta = $cepDAO->procuraRua($digitaRua);
    
    foreach ($consulta as $key => $cons) {
      $ruas[] = $cons->getLogradouro().' - '.$cons->getBairro().' - CEP: '.$cons->getCep();
    }
    //$teste = [ "Choice1", "Choice2" ];
    //print_r($ruas); exit;
    //sleep(1);
    echo json_encode($ruas);

  
?>


