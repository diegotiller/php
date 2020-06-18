<?php
class ajaxController extends controller {

	public function index() {
		$dados = array(
			'frase' => ''
		);
		
		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$dados['frase'] = 'Meu nome é: '.$nome;
		}
		echo json_encode($dados);
		exit;

		//sem o loadView o script.js segue esse padrão
		// dataType: 'json',
		// success:function(json){
		// 	$('.borda').html(json.frase);
		// }

		//com o loadView o script.js segue esse padrão
		// success:function(resposta){
		// 	$('.borda').html(resposta);
		// }

		// $this->loadView('ajax', $dados);
	}
}