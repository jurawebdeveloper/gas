<?php
    date_default_timezone_set("America/Sao_Paulo");
      
    require_once('autoload.php');
          
?>

<!--/*****************************************************************************/-->
<?php 
  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();

  $cliente->setNumero($_POST['numero']);
  $cliente->setCep($_POST['cep']);
  $cliente->setNome($_POST['nome']);
  $cliente->setCpf($_POST['cpf']);
  $cliente->setAniversario($_POST['aniversario']);

//print_r($cliente); exit;

  $clienteDAO->insereCliente($cliente);
  $msg = 'Executado com sucesso!';
  $class = 'success'; 
  
  header("Location:index.php?msg=$msg&class=$class");

?>
