<?php
require_once 'Model.php';
class ItemVendaDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'ItemVenda';
		$this->table = 'itemvenda';
	}
	public function insereItemVenda(ItemVenda $itemVenda){
		$valores = "
			null,
			'{$itemVenda->getQuantidade()}',
			'{$itemVenda->getValorCobradoUn()}',
			'{$itemVenda->getItemEstoque()}',
			'{$itemVenda->getVenda()}'";
		//print_r($valores); exit;
		$this->inserir($valores);
	}
	public function alteraItemVenda(ItemVenda $itemVenda){
		$valores = "
			quantidade = '{$itemVenda->getQuantidade()}',
			valorCobradoUn = '{$itemVenda->getValorCobradoUn()}',
			itemEstoque_id = '{$itemVenda->getItemEstoque()}',
			venda_id = '{$itemVenda->getVenda()}'";
		$this->alterar($itemVenda->getId(),$valores);
	}



}
?>