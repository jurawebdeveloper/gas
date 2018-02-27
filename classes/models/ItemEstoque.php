<?php
class ItemEstoque{
		private $id;
		private $dataEntrada;
		private $quantidade;
		private $valorCompraUn;
		private $valorVendaUn;
		private $produto;



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
    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    /**
     * @param mixed $dataEntrada
     *
     * @return self
     */
    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     *
     * @return self
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        
    }

    /**
     * @return mixed
     */
    public function getValorCompraUn()
    {
        return $this->valorCompraUn;
    }

    /**
     * @param mixed $valorCompraUn
     *
     * @return self
     */
    public function setValorCompraUn($valorCompraUn)
    {
        $this->valorCompraUn = $valorCompraUn;

        
    }

    /**
     * @return mixed
     */
    public function getValorVendaUn()
    {
        return $this->valorVendaUn;
    }

    /**
     * @param mixed $valorVendaUn
     *
     * @return self
     */
    public function setValorVendaUn($valorVendaUn)
    {
        $this->valorVendaUn = $valorVendaUn;

        
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param mixed $produto
     *
     * @return self
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;

        
    }
}
?>