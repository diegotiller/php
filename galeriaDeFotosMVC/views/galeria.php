<div class="container">
	<div class="row">
		<?php
		if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])):	?>
			<fieldset>
				<legend>Adicionar foto</legend>
				<form method="POST" enctype="multipart/form-data">
					Título:
					<br>
					<input type="text" name="titulo">
					<br><br>
					Foto:
					<br>
					<input type="file" name="galeriaFoto">
					<br><br>
					<input type="submit" class="btn btn-primary" value="Enviar arquivo">
				</form>
			</fieldset>
		<?php endif; ?>
		<br>
		<h1>Galeria de fotos</h1>
		<br>
		<?php foreach ($fotos as $foto): ?>
		<img src="assets/images/galeria/<?php echo $foto['url']; ?>" whidth="300" border="0">
		<br>
		<?php echo $foto['titulo']; ?>
		<hr>
		<?php endforeach; ?>
	</div>
</div>

