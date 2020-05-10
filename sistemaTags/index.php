<?php 

try {
	$pdo = new PDO("mysql:dbname=tags;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}

//pegando caracteristicas
$sql = "SELECT caracteristicas FROM usuarios";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
	$lista = $sql->fetchAll();

	$carac = array();

	foreach ($lista as $usuario) {
		$palavras = explode(",", $usuario['caracteristicas']);

		foreach ($palavras as $palavra) {
			$palavra = trim($palavra);

			if (isset($carac[$palavra])) {
				$carac[$palavra]++;
			}else{
				$carac[$palavra] = 1;
			}
		}
	}

	//ordenar array maior ara menor
	arsort($carac);

	//separa as palavras
	$palavras = array_keys($carac);

	//separa as contagens
	$contagens = array_values($carac);
	
	$maior = max($contagens);
	$tamanhos = array(11, 15, 20, 30);

	for ($x=0; $x < count($palavras); $x++) { 
		$n = $contagens[$x] / $maior;
		$h = ceil($n * count($tamanhos));

		echo utf8_encode("<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$x]."(".$contagens[$x].")</p>");
	}

}


?>