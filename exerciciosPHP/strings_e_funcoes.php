<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<title>Mensagens divertidas</title>
	</head>

	<body>
		
		<?php
			
			//int
			$valor_inteiro = 1 * 4;
			echo $valor_inteiro;

			echo '<br />';
			
			$valor_inteiro = $valor_inteiro * 2;
			echo $valor_inteiro;

			echo '<br />';

			//float
			$valor_fracionado = -7.7;
			echo $valor_fracionado;

			echo '<br />';

			//boolean
			$estado = true; //false
			echo $estado;

			echo '<br />';

			//strings
			$texto = "curso php - $valor_inteiro $valor_fracionado";
			echo $texto;
			//arrays (mais a diante)

		?>

	</body>
</html>