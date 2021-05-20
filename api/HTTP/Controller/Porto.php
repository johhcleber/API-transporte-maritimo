<?php


require_once 'HTTP/Model/PortoModel.php';

class Porto
{
    private $portoModel;

    public function __construct()
    {
        $this->portoModel = new PortoModel();
    }

    public function get($codigo)
    {
        return $this->portoModel->get($codigo);
    }

    public function getAll()
    {
        return $this->portoModel->getAll();
    }

    public function add($Request) 
    {
        return $this->portoModel->add($Request);
    }

    public function update($codigo, $Request)
    {
        return $this->portoModel->update($codigo, $Request);
    }

    public function delete($codigo)
    {
        return $this->portoModel->delete($codigo);
    }
}