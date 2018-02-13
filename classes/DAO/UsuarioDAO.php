
<?php 
require_once 'Model.php';
clas UsuarioDAO extends Model{
	function __construct(){
		parent::__construct();
		$this->class = 'Usuario';
		$this->table = 'usuario';
	}
	public function insereUsuario(Usuario $usuario){
		$valores = "
			null,
			'{$usuario->getNome()}',
			'{$usuario->getPerfil()}',
			'{$usuario->getSenha()}'";
		$this->inserir($valores);
	}
	public function alteraUsuario(Usuario $usuario){
		$valores = "
			nome = '{$usuario->getNome()}',
			perfil = '{$usuario->getPerfil()}',
			senha = '{$usuario->getSenha()}'";
		$this->alterar($usuario->getId(),$valores);
	}
}


?>