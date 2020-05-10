<?php 

require_once "../header.php";

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
	$pdo->query($sql);
	header("Location: ../index.php");
}

?>


<h2>Cadastrar Usuário: </h2>
<form method="post">
	<span>Nome:</span><br>
	<input type="text" name="nome" required>
	<br><br>
	<span>Email:</span><br>
	<input type="text" name="email" required>
	<br><br>
	<span>Senha:</span><br>
	<input type="password" name="senha" required>
	<br><br>
	<button type="submit">Adicionar</button>
</form>