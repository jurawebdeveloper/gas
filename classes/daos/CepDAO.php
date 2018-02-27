
<?php
require_once 'Model.php';
class CepDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Cep';
		$this->table = 'cep';
	}
	
	public function insereCep(Cep $cep){
		$valores = "
			'{$cep->getCep()}',
			'{$cep->getLogradouro()}',
			'{$cep->getBairro()}',
			'{$cep->getCidade()}',
			'{$cep->getUf()}'";
		$this->inserir($valores);
		//print_r($valores); exit;
	}
	public function altera(Cep $cep){
		$valores = "
			logradouro = '{$cep->getLogradouro()}',
			bairro = '{$cep->getBairro()}',
			cidade = '{$cep->getCidade()}',
			uf = '{$cep->getUf()}'";
		$this->alterar($cep->getCep(),$valores);
	}

	public function procuraRua($digitaRua)
	{
		$termo = "logradouro like '%{$digitaRua}%'";
		return $this->procurarTermo($termo);
	}
}


?>