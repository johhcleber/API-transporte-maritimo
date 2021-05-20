<?php


require_once 'HTTP/Model/AgenteModel.php';

class Agente
{
    private $agenteModel;

    public function __construct()
    {
        $this->agenteModel = new AgenteModel();
    }

    public function get($codigo)
    {
        return $this->agenteModel->get($codigo);
    }

    public function getAll()
    {
        return $this->agenteModel->getAll();
    }

    public function add($Request) 
    {
        return $this->agenteModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->agenteModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->agenteModel->delete($codigo);
    }
}