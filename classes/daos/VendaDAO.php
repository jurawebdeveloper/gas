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
			dataPrevistaPg = '{$venda->getDataPrevista()}',
			cliente_id = '{$venda->getCliente()->getId()}',
			entregador_id = '{$venda->getEntregador()->getId()}'";
		$this->alterar($venda->getId(),$valores);
	}
	public function contagem(){
		$sql = $this->db->prepare("SELECT SUM(quantidade) FROM `itemvenda` WHERE venda_id in(SELECT id FROM `venda` WHERE DATE(dataHora) = CURDATE())");
//print_r($sql); exit;
        $sql->execute();
        return $sql->fetch();
	}

	public function listarVendasDia(){
		$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE DATE(dataHora) = CURDATE() ORDER BY id DESC");
		//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}

	public function listarVendas(){
		$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE DATE(dataHora) > '2001-01-01' ORDER BY id DESC");
		//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}

}
?>