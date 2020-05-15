<?php

// date d (dia) - m (mes) - Y (ano)
$data = date("d/m/Y H:i");

//strtotime = 02/01/2017
$data_inicial = '02/04/2016';
$data_final = '05/04/2016';

$time_inicial = strtotime($data_inicial);
$time_final = strtotime($data_final);

$diferenca_time = $time_final - $time_inicial;

$diasegundos = 24*60*60;
$diferenca_dias = $diferenca_time / $diasegundos;
echo $diferenca_dias;

?>