<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');

    $dataHora = date('Y-m-d H:i');

    $itemEstoque = new ItemEstoque();
    $itemEstoqueDAO = new ItemEstoqueDAO();
    $itens = $itemEstoqueDAO->listar();
    $cliente = new Cliente();
    $clienteDAO = new ClienteDAO();
    $telefone = new Telefone();
    $telefoneDAO = new TelefoneDAO();
    $cep = new Cep();
    $cepDAO = new CepDAO();
    $venda = new Venda();
    $vendaDAO = new VendaDAO();

    $acao = 'cadastrar';
    if (isset($_GET['telefone'])) {
      
      $telefone->setDdd('42');
      $telefone->setNumero($_GET['telefone']);
      
      $telefone = $telefoneDAO->procuraTel($telefone->getNumero());

      if ($telefone) {
        $cliente = $clienteDAO->procurar($telefone->getClienteId());
        $cep = $cepDAO->procuraCep($cliente->getCep());
        $acao = 'alterar';
      }else{}
    }
    
    if (isset($_GET['msg'])) {
      $msg = ($_GET['msg']);
    } else{$msg = "";}
      //print_r($cliente); exit;
?>
  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

          <!-- Form Cliente
      ================================================== -->
          <div class="col-lg-6">
            <div class="page-header">
              <h3 id="forms">Cliente <?php echo $msg; ?></h3>
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
          
          <div class="col-lg-4 offset-lg-1">
            <div class="page-header">
              <h3 id="forms">Venda</h3>
            </div>
            <form class="bs-component" action="mantemVenda.php" method = "post">
              <div class="form-group">
                
                <input value="<?php echo $cliente->getId(); ?>" type="hidden" class="form-control " id="cliente_id" name="cliente_id">
                
                <input value="<?php echo $dataHora ?>" type="hidden" class="form-control " id="dataHora" name="dataHora">
                
                <label class="col-form-label" for="itemEstoque">Produto</label>
                <select class="form-control" name="itemEstoque" id="itemEstoque" required onchange="mudaValor(this)">
                  <option value="">Selecione</option>
                  <?php foreach ($itens as $itemEstoque) { 
                      $produtoDAO = new ProdutoDAO();
                      $produto = $produtoDAO->procurar($itemEstoque->produto_id);
                    ?>
                  <option value="<?php echo $itemEstoque->getId(); ?>" data-value="<?php echo $itemEstoque->getValorVendaUn(); ?>"> <?php echo $produto->getDescricao(); echo " - "; echo $itemEstoque->getQuantidade(); echo " no estoque";?> </option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Quantidade</label>
                <input value = 1 type="number" class="form-control " id="quantidade" name="quantidade"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Valor Cobrado</label>
                <input value="" type="text" class="form-control " id="valorCobrado" name="valorCobrado"  placeholder="Selecione o produto">
                
                <label class="col-form-label" for="rua">Tipo Pagamento</label>
                <select class="form-control" name="tipoPagamento" id="tipoPagamento" >
                  <option value="">Selecione</option>
                  <option value="1" >Dinheiro</option>
                  <option value="2" >Débito</option>
                  <option value="3" >Crédito</option>
                  <option value="4" >Cheque</option>
                  <option value="5" >Prazo</option>
                    
                </select>
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
      function mudaValor(id)
      {
        let valor = $('#itemEstoque').find(':selected').data('value');
        $('#valorCobrado').val(valor);
      }
    </script>
