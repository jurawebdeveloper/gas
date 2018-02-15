
<?php 
	class Telefone{
		private $id;
		private $ddd;
		private $numero;
		private $cliente;
		
 

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
     * @param mixed $ddd
     *
     * @return self
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;

        
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
     * @param mixed $cliente
     *
     * @return self
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}


?>