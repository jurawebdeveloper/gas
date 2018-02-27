<?php
class ItemVenda{
		private $id;
		private $quantidade;
		private $valorCobradoUn;
		private $itemEstoque;
		private $venda;



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
    public function getValorCobradoUn()
    {
        return $this->valorCobradoUn;
    }

    /**
     * @param mixed $valorCobradoUn
     *
     * @return self
     */
    public function setValorCobradoUn($valorCobradoUn)
    {
        $this->valorCobradoUn = $valorCobradoUn;

        
    }

    /**
     * @return mixed
     */
    public function getItemEstoque()
    {
        return $this->itemEstoque;
    }

    /**
     * @param mixed $itemEstoque
     *
     * @return self
     */
    public function setItemEstoque($itemEstoque)
    {
        $this->itemEstoque = $itemEstoque;

        
    }

    /**
     * @return mixed
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @param mixed $venda
     *
     * @return self
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;

        
    }
}
?>