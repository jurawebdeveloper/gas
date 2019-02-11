<?php
require_once 'Model.php';

class ItemEstoqueDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'ItemEstoque';
		$this->table = 'itemestoque';
	}
	public function insereItemEstoque(ItemEstoque $itemEstoque){
		$valores = "
			null,
			'{$itemEstoque->getDataEntrada()}',
			'{$itemEstoque->getQuantidade()}',
			'{$itemEstoque->getValorCompraUn()}',
			'{$itemEstoque->getValorVendaUn()}',
			'{$itemEstoque->getProduto()->getId()}',
			'{$itemEstoque->getNota()}'";
		$this->inserir($valores);
	}
	public function alteraItemEstoque(ItemEstoque $itemEstoque){
		$valores = "
			dataEntrada = '{$itemEstoque->getDataEntrada()}',
			quantidade = '{$itemEstoque->getQuantidade()}',
			valorCompraUn = '{$itemEstoque->getValorCompraUn()}',
			valorVendaUn = '{$itemEstoque->getValorVendaUn()}',
			produto_id = '{$itemEstoque->getProduto()->getId()}',
			nu_nota_fiscal = '{$itemEstoque->getNota()}'";
		$this->alterar($itemEstoque->getId(),$valores);
	}

	public function baixaItem($id, $quantidade) {
        $sql = $this->db->prepare("UPDATE {$this->table} SET quantidade = quantidade - {$quantidade} WHERE id = {$id}");
        //print_r($sql); exit;
        $sql->execute();
    }

    public function voltaItem($id, $quantidade) {
        $sql = $this->db->prepare("UPDATE {$this->table} SET quantidade = quantidade + {$quantidade} WHERE id = {$id}");
        //print_r($sql); exit;
        $sql->execute();
    }
		public function listarItemEst(){
			$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE quantidade > 0 ORDER BY id DESC");
			//print_r($sql); exit;
			$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
			$sql->execute();
			return $sql->fetchAll();
		}



}
?>