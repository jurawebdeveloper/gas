<?php
class ItemEstoque{
		private $id;
		private $dataEntrada;
		private $quantidade;
		private $valorCompraUn;
		private $valorVendaUn;
        private $produto;
        private $nota;



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        
    }

    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        
    }

     public function getValorCompraUn()
    {
        return $this->valorCompraUn;
    }

    public function setValorCompraUn($valorCompraUn)
    {
        $this->valorCompraUn = $valorCompraUn;

        
    }

     public function getValorVendaUn()
    {
        return $this->valorVendaUn;
    }

     public function setValorVendaUn($valorVendaUn)
    {
        $this->valorVendaUn = $valorVendaUn;

        
    }

     public function getProduto()
    {
        return $this->produto;
    }

     public function setProduto($produto)
    {
        $this->produto = $produto;

        
    }

    public function getNota()
    {
        return $this->nota;
    }

     public function setNota($nota)
    {
        $this->nota = $nota;

        
    }
}
?>