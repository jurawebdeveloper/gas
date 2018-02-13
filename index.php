<?php
session_start();
require_once "template/autoload.php"; 
$login = new Login();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logar'])){
        $login->setEmail($email = addslashes($_POST['email']));
        $login->setSenha($senha = addslashes($_POST['senha']));
        $login->setTipo($tipo = addslashes($_POST['tipo']));
        

        if($login->logar()){

          switch ($login->getTipo()) {
            case 'admin':
              header("Location: principal.php");
              break;
            case 'professor':
              header("Location: atendimentos.php");
              break;
            case 'turma':
              header("Location: atendimentos.php");
              break;
          }
        }else if(isset($_GET['erro']) AND $_GET['erro'] != ''){
            $erro = $_GET['erro'];
        }else {
            $erro = "Usuário ou senha inválidos!!!!";
        }
    }
} else {
  session_destroy();
  if(isset($_GET['erro']) AND $_GET['erro'] != ''){
            $erro = $_GET['erro'];
  }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SisGCS :: Sistema de Gerenciamento e Controle de Salão - SENAC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="js/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page home-page">
<div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content" align="center">
                  <div class="logo">
                  	<div style="background: #fff; border-radius: 10%; width: 210px; height: 200px; float: left; padding-top: 30px;" align="center">
                  		<img src="img/senac.png" width="200"  >
                  	</div>
                  	<div style="background: #fff; border-radius: 10%; width: 210px; height: 200px; float: right; padding-top: 20px;" align="center">
                  		<img src="img/LOGO.png" width="200"  >
                  	</div>
                    <!-- <h1>SisGCS</h1> -->
                  </div>
                  <p>&nbsp;</p>
                  <p>Sistema de Gerenciamento e Controle de Salão - SENAC</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" method="post">

                    <div class="i-checks">
                      <div class="col-md-4">
                        <input id="turma" type="radio" checked value="turma" name="tipo" class="radio-template" required>
                        <label for="turma">Turma</label>
                      </div>
                      <div class="col-md-4">
                        <input id="turma" type="radio"  value="professor" name="tipo" class="radio-template">
                        <label for="turma">Professor</label>
                      </div>
                      <div class="col-md-4">
                        <input id="turma" type="radio" value="admin" name="tipo" class="radio-template">
                        <label for="turma">Administração</label>
                      </div>

                    </div>

                    <div class="form-group">
                      <input id="email" type="text" name="email" required="" class="input-material " placeholder="Login:">
                      <label for="email" class="label-material"></label>
                    </div>
                    <div class="form-group">
                      <input id="senha" type="password" name="senha" required="" class="input-material" placeholder="Senha:">
                      <label for="senha" class="label-material"></label>
                    </div><input id="logar" name="logar" type="submit" class="btn btn-primary" value="Entrar" />
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                      <div class="erro">
                    <?php 
                    if(isset($erro)){
                        if(!empty($erro)){
                            echo '<br ><span class="alert alert-danger">'.$erro.'</span>';
                        }
                    }
                    ?>
                </div><!--Mostra Erro-->
                </div>
                
              </div>
                
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>SENAC<!--  - <a href="#" class="external"> Os Sobreviventes 2017</a> --></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>