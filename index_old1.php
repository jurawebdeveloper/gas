

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SiGEG :: Sistema de Gerenciamento de Entregas de Gás</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="jquery_ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="jquery_ui/jquery-ui.css">
    <style>
      .ui-autocomplete-loading {
        background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
      }
    </style>
    
  </head>
  <body>
      <div class="dropdown text-center">
        <h1>SiGEG</h1>
        <p>Inserir menu aqui!</p> 
      </div>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12">
          <h3>Em branco</h3>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          
          <h3>Telefone</h3> 
          <form action="mantemCliente.php" method = "post">
            <div class="form-group">
              
              <input type="text" class="form-control" id="telefone" name="telefone">
            </div>

            <h3>Cliente</h3> 
            <div class="form-group">
              <label for="rua">Rua:</label>
              <input type="text" class="form-control" id="rua" name="rua">
            </div>

            <div class="form-group">
              <label for="logradouro">logradouro:</label>
              <input type="text" class="form-control" id="logradouro" name="logradouro">
            </div>

            <div class="form-group">
              <label for="numero">Número:</label>
              <input type="text" class="form-control" id="numero" name="numero">
            </div>
            <div class="form-group">
              <label for="cep">CEP:</label>
              <input type="text" class="form-control" id="cep" name="cep">
            </div>
            <div class="form-group">
              <label for="nome">Nome do Cliente:</label>
              <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
            <div class="form-group">
              <label for="aniversario">Aniversário:</label>
              <input type="text" class="form-control" id="aniversario" name="aniversario">
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
          <h3>Em Branco</h3>
        </div>
      </div>
    </div>

    <script>
    $( function() {
      function log( message, message_l ) {
        $('#cep').val(message);
        $('#logradouro').val(message_l);
        $('#numero').focus();
      }
   
      $( "#rua" ).autocomplete({
        source: "procuraCepRua.php",
        minLength: 2,
        select: function( event, ui ) {
          let str = ui.item.value;
          let separa = str.split(" - CEP: ");
          let separa_l = separa[0].split(" - ");
          console.log(separa_l);
          log( separa[1], separa_l[0] );
        }
      });
    } );
  </script>


  </body>
</html>
