
<?php 
require_once 'Model.php';
class ClienteDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Cliente';
		$this->table = 'cliente';
	}
	
	public function insereCliente(Cliente $cliente){
		$valores = "
			null,
			'{$cliente->getNumero()}',
			'{$cliente->getCep()}',
			'{$cliente->getNome()}',
			'{$cliente->getCPF()}',
			'{$cliente->getAniversario()}'";
		$this->inserir($valores);
		//print_r($valores); exit;
	}
	public function alteraCliente(Cliente $cliente){
		$valores = "
			numero = '{$cliente->getNumero()}',
			cep = '{$cliente->getCep()->getCep()}',
			nome = '{$cliente->getNome()}',
			cpf = '{$cliente->getCPF()}',
			aniversario = '{$cliente->getAniversario()}'";
		$this->alterar($cliente->getId(),$valores);
	}
}


?>