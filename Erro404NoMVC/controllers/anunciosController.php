<?php 
class anunciosController extends controller {

	public function index(){

		$dados = array();

		$a = new Anuncios();
		$anuncios = $a->getMeusAnuncios();
		$dados['anuncios'] = $anuncios;

		$this->loadTemplate('meusAnuncios', $dados);		
	}

	public function addAnuncio(){

		$dados = array();
		$c = new Categorias();
		$a = new Anuncios();
		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$categoria = addslashes($_POST['categoria']);
			$valor = addslashes($_POST['valor']);
			$descricao = addslashes($_POST['descricao']);
			$estado = addslashes($_POST['estado']);

			$a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);			
		}

		$cats = $c->getLista();
		$dados['cats'] = $cats;

		$this->loadTemplate('addAnuncio', $dados);
	}

	public function edit($id){

		$dados = array();
		$c = new Categorias();
		$a = new Anuncios();
		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$categoria = addslashes($_POST['categoria']);
			$valor = addslashes($_POST['valor']);
			$descricao = addslashes($_POST['descricao']);
			$estado = addslashes($_POST['estado']);
			if(isset($_FILES['fotos'])) {
				$fotos = $_FILES['fotos'];
			} else {
				$fotos = array();
			}

			$a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id);
		}
		if(isset($id) && !empty($id)) {

			$info = $a->getAnuncio($id);
		} else {
			header("Locaton: <?php echo BASE_URL; ?>anuncios");
			exit;
		}

		$cats = $c->getLista();
		$dados['cats'] = $cats;
		$dados['info'] = $info;

		$this->loadTemplate('editAnuncio', $dados);
	}

	public function excluirFoto($id){

		$dados = array();
		$a = new Anuncios();
		if(isset($id) && !empty($id)) {
			$id_anuncio = $a->excluirFoto($id);
		}

		if(isset($id_anuncio)) {
			header("Location: ".BASE_URL."anuncios/edit/".$id_anuncio);
		} else {
			header("Location: ".BASE_URL."anuncios");
		}

		$this->loadTemplate('editAnuncio', $dados);
	}

	public function excluirAnuncio($id){

		$dados = array();
		$a = new Anuncios();
		if(isset($id) && !empty($id)) {
			$a->excluirAnuncio($id);
		}
		header("Location: ".BASE_URL."anuncios");

		$this->loadTemplate('meusAnuncios', $dados);
	}
}
