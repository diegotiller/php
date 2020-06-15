<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Página de Teste</title>
</head>
<body>
	<div style="width: 300px;margin: auto;background-color: #999;padding: 10px;">
		<h1>Este é um cabeçalho <?php echo rand(0, 9999); ?></h1>
		
		<form method="POST">
			<input type="text" placeholder="E-mail"><br><br>

			<input type="password" placeholder="Senha"><br><br>

			<input type="submit" value="Entrar"><br><br>
		</form>

		
	</div>
	
</body>
</html>