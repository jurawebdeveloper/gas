<?php
	class Model{
		protected $table;
		protected $db;
		protected $class;

		//atributos para conexao:
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $dbase = 'salao';

		public function __construct(){

	        try{
		        $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbase, $this->user, $this->pass);
		        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        } catch (PDOException $erro) {
	            echo "Aconteceu o seguinte erro**** " . $erro->getMessage();
        	}
    	}

		public function listar(){
			$sql = $this->db->prepare("SELECT * FROM {$this->table}");
			//print_r($sql); exit;
			$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
			$sql->execute();
			return $sql->fetchAll();
		}
		
		public function procurar($id){
			$sql = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = {$id}");
			//print_r($sql); exit;
			$sql->setFetchMode(PDO::FETCH_CLASS, $this->class);
			$sql->execute();
			return $sql->fetch();
		}
		public function deletar($id){
			$sql = $this->db->prepare("DELETE FROM {$this->table} WHERE id = {$id}");
			//print_r($sql); exit;
			$sql->execute();
		}
		public function inserir($values){
			$sql = $this->db->prepare("INSERT INTO {$this->table} VALUES ($values)");
			//print_r($sql); exit;
			$sql->execute();
			return $this->db->lastInsertId();
		}
		public function alterar($id, $value){
			$sql = $this->db->prepare("UPDATE {$this->table} SET {$value} WHERE id = {$id}");
			//print_r($sql); exit;
			$sql->execute();
		}
		
		
	}
?>