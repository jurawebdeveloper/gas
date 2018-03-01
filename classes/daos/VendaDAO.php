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
			'{$venda->getHoraEntrega()}',
			'{$venda->getTipoPagamento()}',
			'{$venda->getDataPrevista()}',
			'{$venda->getCliente()->getId()}',
			'{$venda->getEntregador()->getId()}'";
		$this->inserir($valores);
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



}
?>