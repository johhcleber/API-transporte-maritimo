<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'HTTP/Request.php';
require_once 'db/Conexao.php';
require_once 'HTTP/Controller/Carga.php';
require_once 'HTTP/Controller/Agente.php';
require_once 'HTTP/Controller/Porto.php';
require_once 'HTTP/Controller/Navio.php';
require_once 'HTTP/Controller/Rota.php';
require_once 'HTTP/Controller/RotaNavio.php';

echo isset($_REQUEST) ? Request::open($_REQUEST, file_get_contents("php://input")) : null;
