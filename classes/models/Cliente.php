
<?php 
	class Cliente{
		private $id;
		private $telefone1;
		private $telefone2;
		private $telefone3;
		private $telefone4;
		private $telefone5;
		private $rua;
		private $numero;
		private $bairro;
		private $cep;
		private $nome;
		private $cpf;
		private $aniversario;
	
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        
    }

    /**
     * @return mixed
     */
    public function getTelefone1()
    {
        return $this->telefone1;
    }

    /**
     * @param mixed $telefone1
     *
     * @return self
     */
    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;

        
    }

    /**
     * @return mixed
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * @param mixed $telefone2
     *
     * @return self
     */
    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;

        
    }

    /**
     * @return mixed
     */
    public function getTelefone3()
    {
        return $this->telefone3;
    }

    /**
     * @param mixed $telefone3
     *
     * @return self
     */
    public function setTelefone3($telefone3)
    {
        $this->telefone3 = $telefone3;

        
    }

    /**
     * @return mixed
     */
    public function getTelefone4()
    {
        return $this->telefone4;
    }

    /**
     * @param mixed $telefone4
     *
     * @return self
     */
    public function setTelefone4($telefone4)
    {
        $this->telefone4 = $telefone4;

        
    }

    /**
     * @return mixed
     */
    public function getTelefone5()
    {
        return $this->telefone5;
    }

    /**
     * @param mixed $telefone5
     *
     * @return self
     */
    public function setTelefone5($telefone5)
    {
        $this->telefone5 = $telefone5;

        
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     *
     * @return self
     */
    public function setRua($rua)
    {
        $this->rua = $rua;

        
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     *
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     *
     * @return self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     *
     * @return self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        
    }

    /**
     * @return mixed
     */
    public function getAniversario()
    {
        return $this->aniversario;
    }

    /**
     * @param mixed $aniversario
     *
     * @return self
     */
    public function setAniversario($aniversario)
    {
        $this->aniversario = $aniversario;

        
    }
}


?>