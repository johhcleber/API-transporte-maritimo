<?php

include_once '../../db/Conexao.php';
include_once '../../model/cargasModel.php';

$codigo = $_GET['codigo'];

$cargas = new cargasModel();
echo $cargas->delete($codigo);