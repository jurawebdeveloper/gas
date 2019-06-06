<?php
date_default_timezone_set("America/Sao_Paulo");
require_once('layout/header.php');

    $dataHora = date('Y-m-d H:i');

    $itemEstoque = new ItemEstoque();
    $itemEstoqueDAO = new ItemEstoqueDAO();
    $produto = new Produto();
    $produtoDAO = new ProdutoDAO();
    $itens = $itemEstoqueDAO->listarItemEst();
    $produtos = $produtoDAO->listar();
      //echo '<pre>'; print_r($itens); exit;
if (isset($_GET['msg'])) {
  $msg = ($_GET['msg']);
} else{$msg = "";}
 
?>
  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

         
          
          <div class="col-lg-4 offset-lg-1">
            <div class="page-header">
              <h3 id="forms">Item Estoque <?php echo $msg; ?></h3>
            </div>
            <form class="bs-component" action="mantemEstoque.php" method = "post">
              <div class="form-group">
                
                <input value="<?php echo $dataHora ?>" type="hidden" class="form-control " id="dataHora" name="dataHora">
                
                <label class="col-form-label" for="produto">Produto</label>
                <select class="form-control" name="produto" id="produto" >
                  <option value="" >Selecione o produto</option>
                  <?php foreach ($produtos as $produto) { 
                      
                    ?>
                  <option value="<?php echo $produto->getId(); ?>" > <?php echo $produto->getDescricao(); ?> </option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="quantidade">Quantidade</label>
                <input value = 1 type="number" class="form-control " id="quantidade" name="quantidade"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="valorCompra">Valor Compra</label>
                <input value="" type="text" class="form-control " id="valorCompra" name="valorCompra"  placeholder="00,00">
               </div>
               <div class="form-group">
                <label class="col-form-label" for="valorVenda">Valor Venda</label>
                <input value="" type="text" class="form-control " id="valorVenda" name="valorVenda"  placeholder="00,00">
               </div>
               <div class="form-group">
                <label class="col-form-label" for="nota">Nota Fiscal de Compra</label>
                <input value="" type="text" class="form-control " id="nota" name="nota"  placeholder="Digite o número da nota">
               </div>
              <button type="submit" class="btn btn-primary">Salvar Item</button>
            </form>
          </div>
          
          <div class="col-lg-4 offset-lg-1">
                    <h3>Estoque</h3>
                    
                    
                    <!--[id:ItemEstoque:private] => 6
                    [dataEntrada:ItemEstoque:private] => 2019-06-02
                    [quantidade:ItemEstoque:private] => 12
                    [valorCompraUn:ItemEstoque:private] => 66
                    [valorVendaUn:ItemEstoque:private] => 80
                    [produto:ItemEstoque:private] => 
                    [nota:ItemEstoque:private] => 
                    [produto_id] => 1
                    [nu_nota_fiscal] => 9994571
                    -->
                    <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">DATA</th>
                    <th scope="col">QTDE</th>
                    <th scope="col">VALOR UN</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">NOTA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($itens as $item) {
                    $prod = $produtoDAO->procurar($item->produto_id);
                    $nota = $item->nu_nota_fiscal;
                    ?>
                    <tr class="table-info">
                      <td> <?php echo $item->getDataEntrada(); ?> </td>
                      <td> <?php echo $item->getQuantidade(); ?> </td>
                      <td> <?php echo $item->getvalorCompraUn(); ?> </td>
                      <td> <?php echo $prod->getDescricao(); ?> </td>
                      <td> <?php echo $nota; ?> </td>
                  
                    </tr>
                  <?php } ?>
                </tbody>
                </table>
          </div>

        </div>
      </div>



<?php
    
    require_once('layout/footer.php');
?>


