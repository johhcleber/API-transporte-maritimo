<?php


require_once 'HTTP/Model/CargaModel.php';

class Carga
{
    private $cargaModel;

    public function __construct()
    {
        $this->cargaModel = new CargaModel();
    }

    public function get($codigo)
    {
        return $this->cargaModel->get($codigo);
    }

    public function getAll()
    {
        return $this->cargaModel->getAll();
    }

    public function add($Request) 
    {
        return $this->cargaModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->cargaModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->cargaModel->delete($codigo);
    }
}