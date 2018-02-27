<?php
class Venda{
		private $id;
		private $cliente;
		private $dataHora;
		private $horaEntrega;
		private $entregador;
		private $tipoPagamento;
		private $dataPrevista;



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
    public function getCliente()
    {
        return $this->cliente;
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
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * @param mixed $dataHora
     *
     * @return self
     */
    public function setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;

        
    }

    /**
     * @return mixed
     */
    public function getHoraEntrega()
    {
        return $this->horaEntrega;
    }

    /**
     * @param mixed $horaEntrega
     *
     * @return self
     */
    public function setHoraEntrega($horaEntrega)
    {
        $this->horaEntrega = $horaEntrega;

        
    }

    /**
     * @return mixed
     */
    public function getEntregador()
    {
        return $this->entregador;
    }

    /**
     * @param mixed $entregador
     *
     * @return self
     */
    public function setEntregador($entregador)
    {
        $this->entregador = $entregador;

        
    }

    /**
     * @return mixed
     */
    public function getTipoPagamento()
    {
        return $this->tipoPagamento;
    }

    /**
     * @param mixed $tipoPagamento
     *
     * @return self
     */
    public function setTipoPagamento($tipoPagamento)
    {
        $this->tipoPagamento = $tipoPagamento;

        
    }

    /**
     * @return mixed
     */
    public function getDataPrevista()
    {
        return $this->dataPrevista;
    }

    /**
     * @param mixed $dataPrevista
     *
     * @return self
     */
    public function setDataPrevista($dataPrevista)
    {
        $this->dataPrevista = $dataPrevista;

        
    }
}
?>