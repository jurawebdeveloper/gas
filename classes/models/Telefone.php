
<?php
class Telefone{
		private $id;
		private $ddd;
		private $numero;
		private $cliente_id;
		
 

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
     * @param mixed $cliente_id
     *
     * @return self
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        
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
    public function getClienteId()
    {
        return $this->cliente_id;
    }
}


?>