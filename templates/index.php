<?php
require 'template.php';

$array = array(
	'titulo' => 'Título da página',
	'nome' => 'Fulano',
	'idade' => 30
);

$tpl = new Template('template.phtml');
$tpl->render($array);