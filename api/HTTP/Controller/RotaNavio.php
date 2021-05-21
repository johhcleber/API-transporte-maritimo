<?php


require_once 'HTTP/Model/RotaNavioModel.php';

class RotaNavio
{
    private $rotaNavioModel;

    public function __construct()
    {
        $this->rotaNavioModel = new RotaNavioModel();
    }

    public function get($codigo)
    {
        return $this->rotaNavioModel->get($codigo);
    }

    public function getAll()
    {
        return $this->rotaNavioModel->getAll();
    }

    public function add($Request) 
    {
        return $this->rotaNavioModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->rotaNavioModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->rotaNavioModel->delete($codigo);
    }
}