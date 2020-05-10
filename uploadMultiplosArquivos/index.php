<?php

$msg=0;
@$enviado= $_REQUEST['msg'];

$erro=0;
@$erroEnvio= $_REQUEST['erro'];

if (isset($enviado)) {
	echo ("<center><h3>Arquivos enviados com sucesso!</h3></center>");
}

if (isset($erroEnvio)) {
	echo ("<center><h3>Erro ao enviar arquivos!</h3></center>");
}

?>
<form action="recebedor.php" method="post" enctype="multipart/form-data">
	<input type="file" name="arquivo[]" multiple><br><br>
	<input type="submit" value="Enviar">
</form>