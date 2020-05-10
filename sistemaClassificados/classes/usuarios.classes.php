<?php 
/*
Classe responsavel por crir os usuários do sistema
*/
class Usuarios {
	//Método para exibir total de usuários
	public function getTotalUsuarios() {
		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;
		//Consulta ao banco para contar numero de linhas e coloca em c
		$sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
		$row = $sql->fetch();
		//Retorna a variavel $row com o numero de linhas  do banco de dados
		return $row['c'];
	}

	//Método para cadastrar usuários no site
	public function cadastrar($nome, $email, $senha, $telefone){
		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;
		//Selecioca o id do usuario caso já esteja cadastrado
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();
		//Se não houver retorno for igual a 0 faz o cadastro do usuário e retorna verdadeiro
		if ($sql->rowCount() == 0) {
			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();
			//Retorna verdadeiro se o usuário foi cadastrado
			return true;
		}
		//Se o retorno de rowCount for diferente de 0 retorna falso
		else{
			return false;
		}
	}

	//Método para fazer login 
	public function login($email, $senha){
		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;
		//Seleciona o id do usuario caso ele exista
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();
		//Verifica se o usuário existe
		if ($sql->rowCount() > 0) {
			//Se existir usuário coloca o id dentro da variável $dado
			$dado = $sql->fetch();
			//Coloca o id do usuário dentro da seção
			$_SESSION['cLogin'] = $dado['id'];
			//Retorna verdadeiro se o usuário esta logado
			return true;
		}else{
			//Retorna falso caso o caso o usuário teja logando com dados errados
			return false;
		}
	}

	//Método para colocar nome do usuário
	public function getNamelogin() {
		//Global criada no arquivo config para conexão com o banco de dados
    	global $pdo;
    	//Seleciona o nome do usuário pelo id
    	$sql = $pdo->prepare("SELECT nome,telefone,email FROM usuarios WHERE id = :id");
    	$sql->bindValue(":id", $_SESSION['cLogin']);
    	$sql->execute();
    	//Verifica se existe usuário
    	if($sql->rowCount() > 0) {
    		//Coloca o nome do usuário na variavel $nameuser
    		$nameuser = $sql->fetch();
    	}
    	//Retorna variável com o nome do usuário
    	return $nameuser;
  	}
}
