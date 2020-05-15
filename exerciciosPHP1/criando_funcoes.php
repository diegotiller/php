<?php

//função sem retornoS
function exibir_boas_vinda($nome){
	echo "Bem vindo ao curso de PHP, ".$nome;
}

//função com retorno
function calcular_soma($numero1,$numero2){
	return $numero1+$numero2;
}

//Chamar a função
exibir_boas_vinda('Paulo');
echo "<br />";
echo calcular_soma(2,2);

?>