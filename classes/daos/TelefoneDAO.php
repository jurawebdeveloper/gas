
<?php
require_once 'Model.php';
class TelefoneDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Telefone';
		$this->table = 'telefone';
	}

	public function procuraTel($numero){
			$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE numero = {$numero}");
			$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
			//print_r($sql); exit;
			$sql->execute();
			return $sql->fetch();
		}
	
	public function insereTelefone(Telefone $telefone){
		$valores = "
			null,
			'{$telefone->getDdd()}',
			'{$telefone->getNumero()}',
			'{$telefone->getClienteId()}'";
		$this->inserir($valores);
		//print_r($valores); exit;
	}
	public function alteraTelefone(Telefone $telefone){
		$valores = "
			ddd = '{$telefone->getDdd()}',
			numero = '{$telefone->getNumero()}',
			cliente_id = '{$telefone->getClienteId()}'";
		$this->alterar($telefone->getId(),$valores);
	}
}


?>