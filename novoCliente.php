<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');


    $cliente = new Cliente();
    $clienteDAO = new ClienteDAO();
    $telefone = new Telefone();
    $telefoneDAO = new TelefoneDAO();
    $cep = new Cep();
    $cepDAO = new CepDAO();
    
    // print_r($id); exit;
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $cliente = $clienteDAO->procurar($_GET['id']);
      $telefone = $telefoneDAO->procuraTelCli($_GET['id']);
      $cep = $cepDAO->procuraCep($cliente->getCep());
      $acao = 'alterar';
    }else{
      $acao = 'cadastrar';
    }
    if (isset($_GET['msg'])) {
      $msg = ($_GET['msg']);
    } else{$msg = "";}
    
    
?>
  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

          <!-- Form Cliente
      ================================================== -->
          <div class="col-lg-6">
            <div class="page-header">
              <h3 id="forms">Cliente <?php if ($msg) {echo $msg;} ?></h3>
            </div>
            <div class="bs-component">
              <form action="mantemCliente.php?acao=<?php echo $acao; ?>" method = "post">
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Telefone</label>
                    <input value="<?php if ($telefone) {echo $telefone->getNumero();} else echo $_GET['telefone'] ?>" type="text" class="form-control fone" id="telefone" name = "telefone"  placeholder="Digite o telefone...">

                    <input value="<?php if ($telefone) {echo $telefone->getId();}  ?>" type="hidden" class="form-control fone" id="telefone_id" name = "telefone_id">

                    <input value="<?php echo $cliente->getId(); ?>" type="hidden" class="form-control fone" id="cliente_id" name = "cliente_id">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Rua</label>
                    <input value="<?php echo $cep->getLogradouro(); ?>" type="text" class="form-control " id="rua" name = "rua"  placeholder="Digite o nome da rua...">
                    
                    <input type="hidden" class="form-control " id="logradouro" name = "logradouro" >
                    
                    <input value="<?php echo $cep->getCep(); ?>" type="hidden" class="form-control " id="cep" name = "cep"  >
                  </div>
                 <div class="form-group">
                    <label class="col-form-label" for="numero">Número</label>
                    <input value="<?php echo $cliente->getNumero(); ?>" type="text" class="form-control " id="numero" name = "numero"  placeholder="Digite o numero da casa...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Nome do Cliente</label>
                    <input value="<?php echo $cliente->getNome(); ?>" type="text" class="form-control " id="nome" name = "nome"  placeholder="Digite o nome do cliente...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">CPF</label>
                    <input value="<?php echo $cliente->getCpf(); ?>" type="text" class="form-control " id="cpf" name = "cpf"  placeholder="Digite o CPF...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Aniversário</label>
                    <input value="<?php echo $cliente->getAniversario(); ?>" type="text" class="form-control niver" id="aniversario" name = "aniversario"  placeholder="Digite o dia e o mês do aniversário...">
                  </div>
                 

                </fieldset>
                
                  <button type="submit" class="btn btn-primary">Salvar</button>
              </form>
            </div>
          </div>
          <!-- Fim Form Cliente
      ================================================== -->
          

        </div>
      </div>



<?php
    
    require_once('layout/footer.php');
?>

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
