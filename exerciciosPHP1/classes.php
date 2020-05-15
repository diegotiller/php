<?php

class Pessoa{
	//atributos
	var $nome;

	//metodos
	function setnome($nome_definido){
		$this->nome = $nome_definido;
	}

	function getnome(){
		return $this->nome;
	}
}

$pessoa = new Pessoa();

$pessoa->setnome("Diego");
echo $pessoa->getnome();

?>