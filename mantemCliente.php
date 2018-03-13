<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();
  $telefone = new Telefone();
  $telefoneDAO = new TelefoneDAO();

  $acao = ($_GET['acao']);
  
  if ($acao == 'deletar') {
    $telefone = $telefoneDAO->procuraTelCli($_GET['id']);
    $cliente = $clienteDAO->procurar($_GET['id']);
    //print_r($cliente); exit;
    $telefoneDAO->deletar($telefone->getId());
    $clienteDAO->deletar($cliente->getId());
    $msg = 'Cliente excluído com sucesso!';
  } else{
    

    $cliente->setId($_POST['cliente_id']);
    $cliente->setNumero($_POST['numero']);
    $cliente->setCep($_POST['cep']);
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setAniversario($_POST['aniversario']);
    
    
    if ($acao == 'cadastrar') {
      $idCliente = $clienteDAO->insereCliente($cliente);
      $msg = 'Cliente incluído com sucesso!';
      $class = 'success'; 

      $telefone->setId($_POST['telefone_id']);
      $telefone->setDdd('42');
      $telefone->setNumero($_POST['telefone']);
      $telefone->setClienteId($idCliente);
      $telefoneDAO->insereTelefone($telefone);
      $telNum = $telefone->getNumero();
      
    
    } elseif ($acao == 'alterar') {
      $idCliente = $clienteDAO->alteraCliente($cliente);
      $msg = 'Cliente atualizado com sucesso!';
      $class = 'success'; 
    //print_r($idCliente); exit;
      $telefone->setId($_POST['telefone_id']);
      $telefone->setDdd('42');
      $telefone->setNumero($_POST['telefone']);
      $telefone->setClienteId($cliente->getId());
      $telefoneDAO->alteraTelefone($telefone);
      $tel = $telefoneDAO->procurar($telefone->getId());
      $telNum = $tel->getNumero();
    } 
  }

  
  header("Location:clientes.php?msg=$msg&class=$class");

?>
