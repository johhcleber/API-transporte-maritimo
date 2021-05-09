<?php

include_once '../../db/Conexao.php';
include_once '../../model/cargasModel.php';

$dadosRequest = json_decode(file_get_contents("php://input"));
$codigo = $_GET['codigo'];

$cargas = new cargasModel();
echo $cargas->update($codigo, $dadosRequest);
