<?php


require_once 'HTTP/Model/NavioModel.php';

class Navio
{
    private $navioModel;

    public function __construct()
    {
        $this->navioModel = new NavioModel();
    }

    public function get($codigo)
    {
        return $this->navioModel->get($codigo);
    }

    public function getAll()
    {
        return $this->navioModel->getAll();
    }

    public function add($Request) 
    {
        return $this->navioModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->navioModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->navioModel->delete($codigo);
    }
}