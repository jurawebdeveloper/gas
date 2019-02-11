<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();
  $telefone = new Telefone();
  $telefoneDAO = new TelefoneDAO();

  $acao = ($_GET['acao']);
  

  $cliente->setId($_POST['cliente_id']);
  $cliente->setNumero($_POST['numero']);
  $cliente->setCep($_POST['cep']);
  $cliente->setNome($_POST['nome']);
  $cliente->setCpf($_POST['cpf']);
  $cliente->setAniversario($_POST['aniversario']);
  //print_r($cliente); exit;

  if ($acao == 'cadastrar') {
    $idCliente = $clienteDAO->insereCliente($cliente);
    $msg = 'incluído com sucesso!';
    $class = 'success'; 

    $telefone->setId($_POST['telefone_id']);
    $telefone->setDdd($_POST['ddd']);
    $telefone->setNumero($_POST['telefone']);
    $telefone->setClienteId($idCliente);
    $telefoneDAO->insereTelefone($telefone);
    $telNum = $telefone->getNumero();
  //print_r($telNum); exit;
  } elseif ($acao == 'alterar') {
    $idCliente = $clienteDAO->alteraCliente($cliente);
    $msg = 'atualizado com sucesso!';
    $class = 'success'; 
  //print_r($idCliente); exit;
    $telefone->setId($_POST['telefone_id']);
    $telefone->setDdd($_POST['ddd']);
    $telefone->setNumero($_POST['telefone']);
    $telefone->setClienteId($cliente->getId());
    $telefoneDAO->alteraTelefone($telefone);
    $tel = $telefoneDAO->procurar($telefone->getId());
    $telNum = $tel->getNumero();
}
header("Location:novaVenda.php?msg=$msg&class=$class&telefone=$telNum");
?>