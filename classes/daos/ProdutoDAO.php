
<?php
require_once 'Model.php';
clas ProdutoDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Produto';
		$this->table = 'produto';
	}
	public function insereProduto(Produto $produto){
		$valores = "
			null,
			'{$produto->getDescricao()}'";
		$this->inserir($valores);
	}
	public function alteraProduto(Produto $produto){
		$valores = "
			descricao = '{$produto->getDescricao()}'";
		$this->alterar($produto->getId(),$valores);
	}
}


?>