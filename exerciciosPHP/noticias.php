<?php

$noticias = array();

$noticias [1]['titulo'] = 'titulo da notícia 1';
$noticias [1]['conteudo'] = 'conteúdo dessa notícia 1';

$noticias [2]['titulo'] = 'titulo da notícia 2';
$noticias [2]['conteudo'] = 'conteúdo dessa notícia 2';

$noticias [3]['titulo'] = 'titulo da notícia 3';
$noticias [3]['conteudo'] = 'conteúdo dessa notícia 3';

$noticias [4]['titulo'] = 'titulo da notícia 4';
$noticias [4]['conteudo'] = 'conteúdo dessa notícia 4';

//var_dump($notcias);

//while
//$idx = 1;
//while ($idx <= 4) {
//
//	echo $noticias[$idx]['titulo'];
//	echo '<br />';
//	echo $noticias[$idx]['conteudo'];
//	echo '<br />';
//	$idx = $idx + 1;
//	
//}

//do_while
//$idx = 1;
//do{
//	echo $noticias[$idx]['titulo'];
//	echo '<br />';
//	echo $noticias[$idx]['conteudo'];
//	echo '<br />';
//
//	$idx = $idx + 1;
//}while ($idx <= 4);

//for

for ($idx = 1; $idx <= 4; $idx = $idx + 1) { 
	echo $noticias[$idx]['titulo'];
	echo '<br />';
	echo $noticias[$idx]['conteudo'];
	echo '<br />';
}

?>