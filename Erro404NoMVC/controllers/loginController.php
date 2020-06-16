<?php 
class loginController extends controller {

	public function index(){

		$dados = array();

		$u = new Usuarios();
		if(isset($_POST['email']) && !empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];

			if($u->login($email, $senha)) {
				header("Location: ".BASE_URL);
			}else{
				header("Location: ".BASE_URL."login/?e=erro");
			}
		}

		$dados['u'] = $u;
		$this->loadTemplate('login', $dados);

	}

	public function logout(){
		session_start();
		unset($_SESSION['cLogin']);
		header("Location: ".BASE_URL);
	}

	public function erro(){
		$dados = array();
		$erro = "erro";
		$dados['e'] = $erro;
		$this->loadTemplate('login', $dados);
	}

	public function cadastrar(){
		$dados = array();

		$u = new Usuarios();
		if(isset($_POST) && !empty($_POST)) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];
			$telefone = addslashes($_POST['telefone']);

			if(!empty($nome) && !empty($email) && !empty($senha)) {
				if($u->cadastrar($nome, $email, $senha, $telefone)) {
					header("Location: ".BASE_URL."login/cadastrar/?addUser=success");
				} else {
					header("Location: ".BASE_URL."login/cadastrar/?addUser=exists");
				}
			} else {
				header("Location: ".BASE_URL."login/cadastrar/?addUser=erro");
			}

		}

		$this->loadTemplate('addUser', $dados);
	}
}