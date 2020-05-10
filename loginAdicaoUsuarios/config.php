<?php 

$sql = "mysql:dbname=cursoBonieky;host=localhost";
$dbuser = "root";
$dbpassowrd = "";

try {

	$pdo = new PDO($sql, $dbuser, $dbpassowrd);
	// mostrar o erro no pdo forçado
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	echo "Falhou a coneção: ".$e->getMessage();
	
}

?>