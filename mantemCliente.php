<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

?>



<!--/*****************************************************************************/-->
<?php 
  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();
  $telefone = new Telefone();
  $telefoneDAO = new TelefoneDAO();

  $cliente->setNumero($_POST['numero']);
  $cliente->setCep($_POST['cep']);
  $cliente->setNome($_POST['nome']);
  $cliente->setCpf($_POST['cpf']);
  $cliente->setAniversario($_POST['aniversario']);


  $idCliente = $clienteDAO->insereCliente($cliente);
  $msg = 'Executado com sucesso!';
  $class = 'success'; 
//print_r($idCliente); exit;

  $telefone->setDdd('42');
  $telefone->setNumero($_POST['telefone']);
  $telefone->setClienteId($idCliente);


  $telefoneDAO->insereTelefone($telefone);
  
  header("Location:clientes.php?msg=$msg&class=$class");

?>
