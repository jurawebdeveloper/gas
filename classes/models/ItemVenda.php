<?php
class ItemVenda{
		private $id;
		private $quantidade;
		private $valorCobradoUn;
		private $itemEstoque;
		private $venda;

    public function getId(){
        return $this->id;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getValorCobradoUn(){
        return $this->valorCobradoUn;
    }


    public function setValorCobradoUn($valorCobradoUn){
        $this->valorCobradoUn = $valorCobradoUn;
    }


    public function getItemEstoque(){
        return $this->itemEstoque;
    }

    public function setItemEstoque($itemEstoque){
        $this->itemEstoque = $itemEstoque;
    }


    public function getVenda(){
        return $this->venda;
    }

    public function setVenda($venda){
        $this->venda = $venda;
    }
}
?>