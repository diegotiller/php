<?php
require_once "header.php";
?>

<h1>Olá <?php 

if (isset($_GET['nome']) && !empty($_GET['nome'])) {

	$nome = addslashes($_GET['nome']);
	echo $nome;

}

?></h1>

<span>Adicionar Usuário:&nbsp;&nbsp;<a href="adicionar/adicionar.php">Cadastrar</a></span> 
&nbsp; - &nbsp;<a href="index.php?sair">Sair</a>


<table border="0" width="100%">
	<tr>
		<th>Nome: </th>
		<th>E-mail: </th>
		<th>Ações</th>
	</tr>
	<?php 
		$sql = "SELECT * FROM usuarios";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			foreach ( $sql->fetchAll() as $usuarios ) {
				echo '<tr>';
				echo '<td>'.$usuarios['nome'].'</td>';
				echo '<td>'.$usuarios['email'].'</td>';
				echo '<td><a href="adicionar/editar.php?id='.$usuarios['id'].'" onclick="alertaEditar()">Editar</a> - <a href="adicionar/excluir.php?id='.$usuarios['id'].'" onclick="alertaExcluir()">Excluir</a></td>';
				echo '<tr>';
			}
		}else{
			echo "<br><h1>Não há registros para mostrar!</h1></br>";
		}	

		
	?>
</table>

<?php 
require "footer.php";
?>