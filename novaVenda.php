<?php
date_default_timezone_set("America/Sao_Paulo");
require_once('layout/header.php');

    $dataHora = date('Y-m-d H:i');

    $itemEstoque = new ItemEstoque();
    $itemEstoqueDAO = new ItemEstoqueDAO();
    $itens = $itemEstoqueDAO->listarItemEst();
    $itemVenda = new ItemVenda();
    $itemVendaDAO = new ItemVendaDAO();
    $produto = new Produto();
    $produtoDAO = new ProdutoDAO();


//print_r($itens); exit;
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
      if (isset($_GET['channel'])) {
        if(substr($_GET['telefone'],0,1) == '0'){
          $ddd = substr($_GET['telefone'],3,2);
          $num = substr($_GET['telefone'],4);
            } else {
              $ddd = substr($_GET['telefone'],2,2);
              $num = substr($_GET['telefone'],3);
                    }
      } else {
          $ddd = '42';
          $num = ($_GET['telefone']);
          }
      $telefone->setDdd($ddd);
      $telefone->setNumero($num);
      
      $telefone = $telefoneDAO->procuraTel($telefone->getNumero());

      if ($telefone) {
        $cliente = $clienteDAO->procurar($telefone->getClienteId());
        $cep = $cepDAO->procuraCep($cliente->getCep());
        $acao = 'alterar';
        //print $acao;exit;
        if(isset($_GET['acao2'])){
          //print 'acao';exit;
          if($_GET['acao2']=='alteraVenda'){
            
            $acao2 = $_GET['acao2'];
            $venda = $vendaDAO->procurar($_GET['vendaId']);
            //echo'<pre>'; print $venda->getId(); exit;
            $itemVenda = $itemVendaDAO->procurarItemPorVenda($venda->getId());
            $itemVenda = $itemVenda[0];
            //echo '<pre>'; print_r($itemVenda[0]); exit;
            $itemEstoque = $itemEstoqueDAO->procurar($itemVenda->itemEstoque_id);
            $produto = $produtoDAO->procurar($itemEstoque->produto_id);
            $tpPag = $venda->getTipoPagamento();
            $botaoVenda = 'Alterar Venda';
            switch($tpPag){
                      case 1:
                         $descPag = 'Dinheiro'; break;
                      case 2:
                         $descPag = 'Débito'; break;
                      case 3:
                         $descPag = 'Crédito'; break;
                      case 4:
                         $descPag = 'Cheque'; break;
                      default:
                         $descPag = 'Prazo';
                    }
            //echo'<pre>';print_r($produto); exit;
          }else{
            

          }
        } 
        else{ //print 'teste5';exit;
          $venda->setId('');
            $venda->setDataHora($dataHora);
            $venda->setTipoPagamento('selecione');
            $descPag = 'selecione';
            $itemVenda->setQuantidade(1);
            $itemVenda->setValorCobradoUn('Valor');
            $botaoVenda = 'Fechar Venda';
            $produto->setDescricao('Selecione');
            //print_r($itemVenda);exit;
        }
      }//final if('telefone')
      else{
        $venda->setId('');
        $venda->setDataHora($dataHora);
        $venda->setTipoPagamento('selecione');
        $descPag = 'selecione';
        //print_r($venda);exit;
        $itemVenda->setQuantidade(1);
        $itemVenda->setValorCobradoUn('Valor');
        $botaoVenda = 'Fechar Venda';
        $produto->setDescricao('Selecione');

      }
      //print 'teste3';exit;
    }//final isset$_GET['telefone']
   // print 'teste2';exit;
    if (isset($_GET['msg'])) {
      $msg = ($_GET['msg']);
    } else{$msg = "";}
      //print_r($cliente); exit;
    //print 'teste1';exit;
?>
  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

          <!-- Form Cliente
      ================================================== -->
          <div class="col-lg-6">
            <div class="page-header">
              <h3 id="forms">Cliente <?php echo $msg; ?></h3> <!-- imprime mensagem -->
            </div>
            <div class="bs-component">
              <form action="mantemCliente.php?acao=<?php echo $acao; ?>" method = "post">
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Telefone</label>
                    <input value="<?php if ($telefone) {echo $telefone->getNumero();} else echo $num ?>" type="text" class="form-control fone" id="telefone" name = "telefone"  placeholder="Digite o telefone...">
                    <input value="<?php if ($telefone) {echo $telefone->getDdd();} else echo $ddd ?>" type="hidden" class="form-control fone" id="ddd" name = "ddd">

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
            <form class="bs-component" action="mantemVenda.php?acao=<?php echo $acao2;?>&vendaId=<?php echo $venda->getId();?>" method = "post">
              <div class="form-group">
                
                <input value="<?php echo $cliente->getId(); ?>" type="hidden" class="form-control " id="cliente_id" name="cliente_id">
                
                <input value="<?php echo $venda->getId(); ?>" type="hidden" class="form-control " id="venda_id" name="venda_id">
                
                <input value="<?php echo $itemVenda->getId(); ?>" type="hidden" class="form-control " id="itemVenda_id" name="itemVenda_id">
                
                <input value="<?php echo $venda->getDataHora(); ?>" type="hidden" class="form-control " id="dataHora" name="dataHora">
                
                <label class="col-form-label" for="itemEstoque">Produto</label>
                <select class="form-control" name="itemEstoque" id="itemEstoque" required onchange="mudaValor(this)">
                  <option value="<?php echo $produto->getId();?>"><?php echo $produto->getDescricao();?></option>
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
                <input value = <?php echo $itemVenda->getQuantidade()?> type="number" class="form-control " id="quantidade" name="quantidade"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Valor Cobrado</label>
                <input value="<?php echo $itemVenda->getValorCobradoUn()?>" type="text" class="form-control " id="valorCobrado" name="valorCobrado"  placeholder="Valor">
                
                <label class="col-form-label" for="rua">Tipo Pagamento</label>
                <select class="form-control" name="tipoPagamento" id="tipoPagamento" >
                  <option value="<?php echo $tpPag;?>"><?php echo $descPag;?></option>
                  <option value="1" >Dinheiro</option>
                  <option value="2" >Débito</option>
                  <option value="3" >Crédito</option>
                  <option value="4" >Cheque</option>
                  <option value="5" >Prazo</option>
                    
                </select>
              </div>
              <button type="submit" class="btn btn-primary"><?php echo $botaoVenda;?></button>
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
