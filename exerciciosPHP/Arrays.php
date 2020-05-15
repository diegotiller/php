<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<title>Mensagens divertidas</title>
	</head>

	<body>
		
		<?php
			
			//arrays (mais a diante)
			//$lista_de_produtos[1] = 'Feijão';
			//$lista_de_produtos[2] = 'Arroz';
			//$lista_de_produtos[3] = 'Batata';
			//$lista_de_produtos[4] = 'Carne';
			//$lista_de_produtos[5] = 'Frango';
			//$lista_de_produtos[6] = 'Linguiça';
			//$lista_de_produtos[7] = 'Farofa';
			//$lista_de_produtos[8] = 'Alface';
			//$lista_de_produtos[9] = 'Tomate';
			//$lista_de_produtos[10] = 'Cenoura';

		
			$lista_de_produtos = array(
				'a' => 'Feijão',
				'b' => 'Arroz',
				3 => 'Batata',
				4 => 'Carne',
				);


			var_dump($lista_de_produtos);
			echo '<br />';
			//print_r($lista_de_produtos);
			//echo '<br />';
			//echo($lista_de_produtos[4]);

		?>

	</body>
</html>