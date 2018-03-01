<?php
require_once 'Model.php';
class ItemVendaDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'ItemVenda';
		$this->table = 'itemVenda';
	}
	public function insereItemVenda(ItemVenda $itemVenda){
		$valores = "
			null,
			'{$itemVenda->getQuantidade()}',
			'{$itemVenda->getValorCobradoUn()}',
			'{$itemVenda->getItemEstoque()->getId()}',
			'{$itemVenda->getVenda()->getId()}'";
		$this->inserir($valores);
	}
	public function alteraItemVenda(ItemVenda $itemVenda){
		$valores = "
			quantidade = '{$itemVenda->getQuantidade()}',
			valorCobradoUn = '{$itemVenda->getValorCobradoUn()}',
			itemEstoque_id = '{$itemVenda->getItemEstoque()->getId()}',
			venda_id = '{$itemVenda->getVenda()->getId()}'";
		$this->alterar($itemVenda->getId(),$valores);
	}



}
?>