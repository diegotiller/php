

<?php
/*
//strtolower
$texto = "Curso completo PHP.<br />";
echo strtolower( $texto );

?>

<?php

//strtoupper
$texto = "Curso completo PHP.<br />";
echo strtoupper( $texto );

?>

<?php

//ucfirst
$texto = "Curso completo PHP.<br />";
echo ucfirst( $texto );

?>

<?php

//strlen serve para contar caracters da string
$texto = "Curso completo PHP.<br />";
echo strlen( $texto );
*/
/*
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

	$total_string_cpf = strlen( $cpf );

if ($total_string_cpf != 11 && $cpf != '') {
	echo "CPF iválido.";
}

?>

<form method="post" action="">
	<label>Cpf
	<input type="text" name="cpf">
	</label>
	<input type="submit" value="cadastrar">
</form>

*/

/*
//str_replace
$texto = "057.927.317-21";

$cpf = str_replace(".", "", $texto);
$cpf = str_replace("-", "", $cpf);

echo $cpf;
*/

//substr
$texto = "Endenda por que o celular esquenta, se você tem um celular que esquenta...";
$noticia = substr($texto, 0, 38);
echo $noticia." ...";


?>