<?php
require 'environment.php';

$config = array();

if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/bonniek_curso_php_completo/phpGit/galeriaDeFotosMVC/");
	$config['dbname'] = 'classificadosmvcfotos';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}else{
	define("BASE_URL", "http://meusite.com.br/");
	$config['dbname'] = 'nome_do_banco_remoto';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'user_banco_remoto';
	$config['dbpass'] = 'senha_banco_remoto';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
	echo "Erro: ".$e->getMenssage();
	exit;
}