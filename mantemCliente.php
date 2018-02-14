<?php
    date_default_timezone_set("America/Sao_Paulo");
      

          include 'classes/models/Cliente.php' ;
          include 'classes/daos/ClienteDAO.php' ;
?>

<!--/*****************************************************************************/-->
<?php 
  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();


  $cliente->setTelefone1($_POST['telefone1']);
  $cliente->setTelefone2($_POST['telefone2']);
  $cliente->setTelefone3($_POST['telefone3']);
  $cliente->setTelefone4($_POST['telefone4']);
  $cliente->setTelefone5($_POST['telefone5']);
  $cliente->setRua($_POST['rua']);
  $cliente->setNumero($_POST['numero']);
  $cliente->setBairro($_POST['bairro']);
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
