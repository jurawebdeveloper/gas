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


	public function listarVendas($data_hj = '', $data_hj2 = '') {
		if($data_hj == ''){
			$data_hj = '2001-01-01';
		}
		if($data_hj2 == ''){
			$data_hj2 = date('Y-m-d');
		}
		

		$sql = $this->db->prepare("
			SELECT E.nome, C.descricao produto, A.quantidade, B.valorCompraUn, A.valorCobradoUn, D.dataHora, D.tipoPagamento
			FROM itemvenda A
			LEFT JOIN itemestoque B ON A.itemEstoque_id = B.id
			LEFT JOIN produto C ON B.produto_id = C.id
			LEFT JOIN venda D ON A.venda_id = D.id
			LEFT JOIN cliente E ON D.cliente_id = E.id
			WHERE D.dataHora >= '{$data_hj}' AND D.dataHora < '{$data_hj2}1'
					");
		//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}

}
?>