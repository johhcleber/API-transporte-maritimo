<?php

include_once '../../db/Conexao.php';
include_once '../../model/cargasModel.php';

$dadosRequest = json_decode(file_get_contents("php://input"));

$cargas = new cargasModel();
echo $cargas->add($dadosRequest);
