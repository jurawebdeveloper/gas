<?php
require_once 'Model.php';
class VendaDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Venda';
		$this->table = 'venda';
	}
	public function insereVenda(Venda $venda){
		$valores = "
			null,
			'{$venda->getDataHora()}',
			null,
			'{$venda->getTipoPagamento()}',
			null,
			'{$venda->getCliente()}',
			null";
			
		/*	'{$venda->getDataHora()}',
			'{$venda->getHoraEntrega()}',
			'{$venda->getTipoPagamento()}',
			'{$venda->getDataPrevista()}',
			'{$venda->getCliente()->getId()}',
			'{$venda->getEntregador()->getId()}'";*/
		
		return $this->inserir($valores);
	}
	public function alteraVenda(Venda $venda){
		$valores = "
			dataHora = '{$venda->getDataHora()}',
			horaEntrega = '{$venda->getHoraEntrega()}',
			tipoPagamento = '{$venda->getTipoPagamento()}',
			dataPrevistaPg = '{$venda->getDataPrevista()}'";
		$this->alterar($venda->getId(),$valores);
	}
	public function contagem(){
		$sql = $this->db->prepare("SELECT SUM(quantidade) FROM `itemvenda` WHERE venda_id in(SELECT id FROM `venda` WHERE DATE(dataHora) = CURDATE())");
//print_r($sql); exit;
        $sql->execute();
        return $sql->fetch();
	}

	public function listarVendasDia(){
		$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE DATE(dataHora) = CURDATE() AND horaEntrega IS NULL OR horaEntrega = '0000-00-00 00:00:00' ORDER BY id DESC");
		//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}

	

}
?>