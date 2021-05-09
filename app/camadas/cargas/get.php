<?php

include_once '../../db/Conexao.php';
include_once '../../model/cargasModel.php';

$request = file_get_contents("php://input");

$cargas = new cargasModel();
echo $cargas->get($_GET['codigo']);