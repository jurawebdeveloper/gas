

<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');

    $itemEstoqueDAO = new ItemEstoqueDAO();
    $itens = $itemEstoqueDAO->listar();
?>


  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

          <!-- Form Cliente
      ================================================== -->
          <div class="col-lg-6">
            <div class="page-header">
              <h3 id="forms">Cliente</h3>
            </div>
            <div class="bs-component">
              <form action="mantemCliente.php" method = "post">
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Telefone</label>
                    <input type="text" class="form-control " id="telefone" name = "telefone"  placeholder="Digite o telefone...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Rua</label>
                    <input type="text" class="form-control " id="rua" name = "rua"  placeholder="Digite o nome da rua...">
                    <input type="hidden" class="form-control " id="logradouro" name = "logradouro" >
                    <input type="hidden" class="form-control " id="cep" name = "cep"  >
                  </div>
                 <div class="form-group">
                    <label class="col-form-label" for="numero">Número</label>
                    <input type="text" class="form-control " id="numero" name = "numero"  placeholder="Digite o numero da casa...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Nome do Cliente</label>
                    <input type="text" class="form-control " id="nome" name = "nome"  placeholder="Digite o nome do cliente...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">CPF</label>
                    <input type="text" class="form-control " id="cpf" name = "cpf"  placeholder="Digite o CPF...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Aniversário</label>
                    <input type="text" class="form-control " id="aniversario" name = "aniversario"  placeholder="Digite o dia e o mês do aniversário...">
                  </div>
                 

                </fieldset>
                
                  <button type="submit" class="btn btn-primary">Salvar</button>
              </form>
            </div>
          </div>
          <!-- Fim Form Cliente
      ================================================== -->
          
          <div class="col-lg-4 offset-lg-1">
            <div class="page-header">
              <h3 id="forms">Venda</h3>
            </div>
            <form class="bs-component" action="mantemVenda.php" method = "post">
              <div class="form-group">
                <label class="col-form-label" for="rua">Produto</label>
                <select class="form-control" name="id_turma" required>
                  <option value="">-- Escolha o produto --</option>
                    <?php foreach ($itens as $itemEstoque) { 
                      $produtoDAO = new ProdutoDAO();
                      $item = $produtoDAO->procurar($itemEstoque->produto_id);
                    ?>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Quantidade</label>
                <input type="text" class="form-control " id="quantidade" name = "quantidade"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Valor Cobrado</label>
                <input type="text" class="form-control " id="valorCobrado" name = "valorCobrado"  placeholder="Selecione...">
              </div>
              <button type="submit" class="btn btn-primary">Fechar Venda</button>
            </form>
          </div>
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
