<?php
class galeriaController extends controller {

	public function index(){
		$dados = array();

		$fotos = new Fotos();

		$fotos->saveFotos();

		$dados['fotos'] = $fotos->getFotos();

		$this->loadTemplate('galeria', $dados);
	}
}