
<?php
require_once 'Model.php';
clas ItemEstoqueDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'ItemEstoque';
		$this->table = 'itemEstoque';
	}
	public function insereItemEstoque(ItemEstoque $itemEstoque){
		$valores = "
			null,
			'{$itemEstoque->getDataEntrada()}',
			'{$itemEstoque->getQuantidade()}',
			'{$itemEstoque->getValorCompraUn()}',
			'{$itemEstoque->getValorVendaUn()}',
			'{$itemEstoque->getProduto()->getId()}'";
		$this->inserir($valores);
	}
	public function alteraItemEstoque(ItemEstoque $itemEstoque){
		$valores = "
			dataEntrada = '{$itemEstoque->getDataEntrada()}',
			quantidade = '{$itemEstoque->getQuantidade()}',
			valorCompraUn = '{$itemEstoque->getValorCompraUn()}',
			valorVendaUn = '{$itemEstoque->getValorVendaUn()}',
			produto_id = '{$itemEstoque->getProduto()->getId()}'";
		$this->alterar($itemEstoque->getId(),$valores);
	}



}
?>