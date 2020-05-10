<?php
spl_autoload_register(function($class){
	require 'classes/'.$class.'.php';
});

$cavalo = new Cavalo();
$cavalo->falar();

$p = new Pessoa();
$p->andar();