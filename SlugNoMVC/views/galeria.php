<div class="container">
	<div class="row">
		<h1>Albuns</h1>
	</div>
	<ul>
		<?php foreach ($albuns as $album): ?>
		<li>
			<a href="<?php echo BASE_URL; ?>galeria/abrir/<?php echo $album['slug']; ?>">
				<?php echo utf8_encode($album['titulo']) ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>