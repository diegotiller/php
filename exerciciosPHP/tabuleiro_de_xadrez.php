<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<title>Tabuleiro de Xadrez</title>
	</head>

	<body>
		
		<?php

		$tabuleiro[8]['a'] = 'Torre Preta';
		$tabuleiro[8]['b'] = 'Bispo Preta';
		$tabuleiro[8]['c'] = 'Cavalo Preta';
		$tabuleiro[8]['d'] = 'Rainha Preta';
		$tabuleiro[8]['e'] = 'Rei Preta';
		$tabuleiro[8]['f'] = 'Bispo Preta';
		$tabuleiro[8]['g'] = 'Cavalo Preta';
		$tabuleiro[8]['h'] = 'Torre Preta';

		$tabuleiro[7]['a'] = 'Peão Preto';
		$tabuleiro[7]['b'] = 'Peão Preto';
		$tabuleiro[7]['c'] = 'Peão Preto';
		$tabuleiro[7]['d'] = 'Peão Preto';
		$tabuleiro[7]['e'] = 'Peão Preto';
		$tabuleiro[7]['f'] = 'Peão Preto';
		$tabuleiro[7]['g'] = 'Peão Preto';
		$tabuleiro[7]['h'] = 'Peão Preto';

		print_r($tabuleiro);
		echo '<br />';
		print_r($tabuleiro[8]['d']);

		?>

	</body>
</html>