<?php
class galeriaController extends controller {

	public function index() {
		$dados = array();

		$albuns = new Album();

		$dados = array(
			'albuns' => $albuns->getLista()
		);
		
		$this->loadTemplate('galeria', $dados);
	}

	public function abrir($slug) {
		$dados = array();
		
		$albuns = new Album();

		$dados = array(
			'titulo' => $albuns->getAlbum($slug)
		);

		$this->loadTemplate('album', $dados);
	}

}