<?php


require_once 'HTTP/Model/RotaModel.php';

class Rota
{
    private $rotaModel;

    public function __construct()
    {
        $this->rotaModel = new RotaModel();
    }

    public function get($codigo)
    {
        return $this->rotaModel->get($codigo);
    }

    public function getAll()
    {
        return $this->rotaModel->getAll();
    }

    public function add($Request) 
    {
        return $this->rotaModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->rotaModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->rotaModel->delete($codigo);
    }
}