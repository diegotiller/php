<?php

class Pessoa{

	private $nome;

	public function correr(){
		echo $this->nome ." correndo";
	}

	function __construct($parametro_nome){
		echo "Construtor iniciado.<br />";
		$this->nome = $parametro_nome;
	}

	function __destruct(){
		echo "Objeto removido.<br />";
	}

}

$pessoa = new Pessoa('Diego');
$pessoa->correr();

?>