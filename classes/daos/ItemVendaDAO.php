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


	public function listarVendasDatas($data_ini = '', $data_fim = '') {
		if($data_ini == ''){
			$data_ini = date('Y-m').'-01';
			//print $data_ini; exit;
		}
		if($data_fim == ''){
			$data_fim = date('Y-m-d').' 23:59:59';
			//print $data_fim; exit;
		}


		$sql = $this->db->prepare("
			SELECT *FROM itemvenda A
			LEFT JOIN venda D ON A.venda_id = D.id
			WHERE D.dataHora >= '{$data_ini}' AND D.dataHora <= '{$data_fim}'");
		//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}
//e
}
?>