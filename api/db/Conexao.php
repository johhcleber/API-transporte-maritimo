<?php


class Conexao {

    private static $host = 'localhost';
	private static $dbname = 'transporte_maritimo';
	private static $user = 'root';
	private static $password = '';

	public static $conexao;

	public function __construct()
    {
        try{

			// Conexão pdo para mysql, para outros bancos e outros metodos consulte a documentação: https://www.php.net/manual/en/book.pdo.php

			self::$conexao = new PDO("mysql:host=". self::$host.";dbname=".self::$dbname,self::$user,self::$password);
			self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		self::$conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		}catch(PDOException $e){
				
		}

    }
}