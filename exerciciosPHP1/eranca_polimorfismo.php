<?php

//classe mãe ou super classe
class Felino{
	var $mamifero = 'sim';

	function correr(){
		echo 'Correr como felino.';
	}
}

//classe filha ou subclasse
class Chita extends Felino{


	//polimorfismo
	function correr(){
		echo 'Correr como chita a 100 km/h';
	}

}

$chita = new Chita();
echo $chita->mamifero.'<br />';
$chita->correr();

?>