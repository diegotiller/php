<?php require_once 'pages/header.php'; ?>

<?php 
if (empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

//confirmação de exclusão de anuncio
if (isset($_GET['anuncio']) && !empty($_GET['anuncio'])) {
	$anuncio = addslashes($_GET['anuncio']);
	if ($anuncio == 'Excluido'):
	?>
	<div class="alert alert-success">
		Anúncio excluido!
	</div>
	<?php
	elseif ($anuncio == 'NaoExcluido'):
	?>
	<div class="alert alert-warning">
		Anúncio não excluido!
	</div>
	<?php
	endif;
}
?>

<div class="container">
	<h1>Meus anúncios</h1>
		
	<a href="add-anuncio.php" class="btn btn-default"><button type="button" class="btn btn-primary">Adicionar Anúncio</button></a>
	<br><br>		
	<div class="row">
		<table class="table table-hover table-striped"><!-- classe table-striped foi removida -->
	 	 	<thead>
	 			<tr>
					<th scope="col">Foto</th>
					<th scope="col">Título</th>
					<th scope="col">Valor</th>
		    		<th scope="col">Ações</th>
		  		</tr>
  			</thead>
  			<?php 
  			require_once "classes/anuncios.classes.php";
 	 		$a = new Anuncios();
 	 		$anuncios = $a->getMeusAnuncios();
 	 		?>
 	 		<tbody>
 	 			<?php 
 		 		//so mostra a tabela caso tenha algo para exibir
 		 		if (isset($anuncios) && !empty($anuncios)):
 		 			foreach($anuncios as $anuncio):
		  		?>
				<tr>
					<td class="align-middle" scope="row">
						<?php if (!empty($anuncio['url'])): ?>
							<img src="assets/img/anuncios/<?php echo $anuncio['url']; ?>" height="30" border="0">
						<?php else: ?>
							<img src="assets/img/default.png" height="30" border="0">
						<?php endif; ?>
					</td>
					<td class="align-middle"><?php echo $anuncio['titulo']; ?></td>
					<td class="align-middle"><?php echo number_format($anuncio['valor'], 2); ?></td>
					<td class="align-middle">
						<a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-info">Editar</a>
						<a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
				<?php 
					endforeach;
				endif;
				?>
			</tbody>
		</table>
	</div>
</div>

<?php require_once 'pages/footer.php'; ?>