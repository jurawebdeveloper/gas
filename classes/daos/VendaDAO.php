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
		$sql = $this->db->prepare("SELECT COUNT(*) as total FROM {$this->table} WHERE DATE(dataHora) = CURDATE()");
        $sql->execute();
        return $sql->fetch();
	}



}
?>