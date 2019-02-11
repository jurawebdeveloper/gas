<?php
date_default_timezone_set("America/Sao_Paulo");
require_once('autoload.php');

$venda = new Venda();
$vendaDAO = new VendaDAO();

$contagemVendasArray = $vendaDAO->contagem();
$contagemVendas = $contagemVendasArray[0];
//print_r($contagemVendas); exit;
?>


<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Sistema Entrega Gas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <!-- <link rel="stylesheet" href="css/custom.min.css"> -->
    
    <link rel="stylesheet" href="jquery_ui/jquery-ui.css">
    <style>
      .ui-autocomplete-loading {
        background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
      }
    </style>

  </head>
  <body>

    <div class="container" style="background-color: #B2EBF2;">

      <!-- Navbar
      ================================================== -->
      <div class="bs-docs-section clearfix">
        <div class="row">
          <div class="col-lg-12">
 
            <div class="bs-component">
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"> <h4> Gerenciamento de Entrega de Gás </h4></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                      <a class="nav-link" href="index.php"><span class=" btn btn-secondary">PRINCIPAL</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="novoEstoque.php"><span class="btn btn-danger">ESTOQUE</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="clientes.php"><span class="btn btn-warning">CLIENTES</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><span class="btn btn-info">RELATÓRIOS</span></a>
                    </li>
                  
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <span class="btn btn-dark">Total vendas de hoje: <?php echo $contagemVendas; ?></span>
                  </form>
                </div>
              </nav>
            </div>
           </div>
        </div>
      </div>
    