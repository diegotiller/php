<div class="container">
	<div class="row">
		<?php 
		foreach ($titulo as $album) {
			echo "<h3>Este é o album de <strong>".utf8_encode($album['titulo'])."</strong></h3>";
		}
		?>
	</div>
</div>