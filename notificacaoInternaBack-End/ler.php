<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_notificacao;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1'";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {
	foreach($sql->fetchAll() as $item) {
		$propriedades = json_decode($item['propriedades']);

		if($item['notificacao_tipo'] == 'MSG') {
			echo $propriedades->msg."<br/>";
		}
		elseif($item['notificacao_tipo'] == 'CURTIDA') {
			echo $propriedades->curtidor." curtiu a foto ".$propriedades->id_foto."<br/>";
		}
		echo "<hr/>";
	}
	//apos ler as notificações as marca como lido
	$sql = $pdo->query("UPDATE notificacoes SET lido = '1' WHERE id_user = '1'");
}

//marcar nootifiações como não lido
//$sql = $pdo->query("UPDATE notificacoes SET lido = '0' WHERE id_user = '1'");
