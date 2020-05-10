<?php 

session_start();
if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$dsn = "mysql:dbname=cursobonieky;host=localhost";
	$dbuser = "root";
	$dbpass = "";

	try {

		$db = new PDO($dsn, $dbuser, $dbpass);

		$sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();

			$_SESSION['id'] = $dado['id'];

			header("Location: index.php?nome=".$dado['nome']."");
		}
		

	} catch (PDOException $e) {

		echo "Falhou: ".$e->getMessage();

	}
}

?>

<h1>Página de login</h1>

<form method="post">
	
	<span>E-mail: </span><br>
	<input type="email" name="email">
	<br><br>
	<span>Senha: </span><br>
	<input type="password" name="senha">
	<br><br>
	<input type="submit" value="Entrar">	

</form>