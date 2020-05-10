<?php 

try {
	$pdo = new PDO("mysql:dbname=cursobonieky;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = $_POST['nome'];
	$mensagem = $_POST['mensagem'];

	$sql = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":msg", $mensagem);
	$sql->execute();
}

?>

<fieldset>
	<form method="post">
		<span>Nome: <br></span>
		<input type="text" name="nome"><br><br>
		<span>Mensagem: <br></span>
		<textarea name="mensagem" id="" cols="30" rows="10"></textarea><br><br>
		<input type="submit" value="Enviar Mensagem">
	</form>
</fieldset>
<br><br>

<?php 

$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
	foreach ($sql->fetchAll() as $mensagem):
	?>

	<strong><?php echo $mensagem['nome']."&nbsp;:&nbsp;".$mensagem['data_msg']; ?></strong><br><br>
	<?php echo $mensagem['msg']; ?>
	<hr><br>

	<?php
	endforeach;
	
}else{
		echo "Não há mensagens.";
	}

?>

