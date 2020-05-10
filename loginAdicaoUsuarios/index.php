<?php 

session_start();

$sair=0;
@$sair= $_REQUEST['sair'];

if (isset($sair)) {
	session_destroy();
	header("Location: login.php");
} 

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	require_once "tabelaUsuarios.php";
} else {
	header("Location: login.php");
}



?>