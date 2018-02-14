
<?php 
require_once 'Model.php';
class ClienteDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Cliente';
		$this->table = 'cliente';
	}
	public function procuraCliTel($telefone){
			$sql = $this->db->prepare("SELECT * FROM {$this->table} 
				WHERE telefone1 = {$telefone}
				   OR telefone2 = {$telefone}
				   OR telefone3 = {$telefone}
				   OR telefone4 = {$telefone}
				   OR telefone5 = {$telefone}");
			//print_r($sql); exit;
			$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
			$sql->execute();
			return $sql->fetch();
		}

	public function insereCliente(Cliente $cliente){
		$valores = "
			null,
			'{$cliente->getTelefone1()}',
			'{$cliente->getTelefone2()}',
			'{$cliente->getTelefone3()}',
			'{$cliente->getTelefone4()}',
			'{$cliente->getTelefone5()}',
			'{$cliente->getRua()}',
			'{$cliente->getNumero()}',
			'{$cliente->getBairro()}',
			'{$cliente->getCep()}',
			'{$cliente->getNome()}',
			'{$cliente->getCPF()}',
			'{$cliente->getAniversario()}'";
		$this->inserir($valores);
		//print_r($valores); exit;
	}
	public function alteraCliente(Cliente $cliente){
		$valores = "
			Telefone1 = '{$cliente->getTelefone1()}',
			Telefone2 = '{$cliente->getTelefone2()}',
			Telefone3 = '{$cliente->getTelefone3()}',
			Telefone4 = '{$cliente->getTelefone4()}',
			Telefone5 = '{$cliente->getTelefone5()}',
			rua = '{$cliente->getRua()}',
			numero = '{$cliente->getNumero()}',
			bairro = '{$cliente->getBairro()}',
			cep = '{$cliente->getCep()}',
			nome = '{$cliente->getNome()}',
			cpf = '{$cliente->getCPF()}',
			aniversario = '{$cliente->getAniversario()}'";
		$this->alterar($cliente->getId(),$valores);
	}
}


?>