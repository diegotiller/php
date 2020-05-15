<?php

class Veiculo{
	/*
	public
	private
	protected
	*/
	private $placa;
	private $cor;
	protected $tipo='Caminhonete';

	public function setplaca($parametro_placa){
		$this->placa = $parametro_placa;
	}

	public function getplaca(){
		return $this->placa;
	}
}

class Carro extends Veiculo{
	public function exibirtipo(){
		echo $this->tipo;
	}

}

$carro = new Carro();
$carro->exibirtipo();



?>