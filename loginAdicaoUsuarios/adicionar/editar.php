<?php 

require_once "../header.php";

$id = 0;

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);
}

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: ../index.php");
}



$sql = "SELECT * FROM usuarios WHERE id = $id";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
	$dado = $sql->fetch();
}else{
	header("Location: ../index.php");
}

?>

<h2>Editar Usuário: </h2>
<form method="POST">
	<span>Nome:</span><br>
	<input type="text" name="nome" required value="<?php echo $dado['nome']; ?>">
	<br><br>
	<span>Email:</span><br>
	<input type="text" name="email" required value="<?php echo $dado['email']; ?>">
	<br><br>
	<button type="submit">Atualizar</button>
</form>
