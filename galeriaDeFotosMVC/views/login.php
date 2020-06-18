<div class="container">
	<?php
	if (isset($_GET['e']) && $_GET['e'] == "erro") {
		echo 
		'<div class="alert alert-danger">
			Usuário e/ou Senha errados!
		</div>';
	}
	?>
	<h1>Login</h1>
	
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
		<input type="submit" value="Fazer Login" class="btn btn-default" />
	</form>

</div>