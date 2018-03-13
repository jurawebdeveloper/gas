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
			'{$cliente->getNome()}',
			'{$cliente->getCPF()}',
			'{$cliente->getAniversario()}',
			 {$cliente->getCep()}";
		$this->inserir($valores);
		//print_r($valores); exit;
		return $this->db->lastInsertId(); //retorna o id que acabou de ser gerado no insereCliente
		//print_r($this->db->lastInsertId()); exit;
	}
	public function alteraCliente(Cliente $cliente){
		$valores = "
			numero = '{$cliente->getNumero()}',
			nome = '{$cliente->getNome()}',
			cpf = '{$cliente->getCPF()}',
			aniversario = '{$cliente->getAniversario()}',
			cep = '{$cliente->getCep()}'";
		$this->alterar($cliente->getId(),$valores);
	}
	public function listaCliEndereco($cep, $numero){
		$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE cep = $cep AND numero = $numero");
			//print_r($sql); exit;
		$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
		$sql->execute();
		return $sql->fetchAll();
	}
}


?>