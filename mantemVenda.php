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
?>