<?php require_once 'pages/header.php'; ?>

<div class="container">
	<h1>Login <small class="text-muted">- Classificados</small></h1>
	<?php 
	require_once 'classes/usuarios.classes.php';
	$u = new Usuarios();
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		if ($u->login($email, $senha)) {
			?>
			<script type="text/javascript">window.location.href="./";</script>
			<?php
		}else{
			?>
			<div class="alert alert-danger" role="alert">Usuário e/ou Senha errados!</div>
			<?php
		}
	}

	?>
	<form method="POST">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">E-mail: </span>
			</div>
			<input type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="Digite seu e-mail" name="email" id="email" aria-describedby="basic-addon1">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Senha: </span>
			</div>
			<input type="password" class="form-control" placeholder="Digite sua senha" aria-label="Digite sua senha" name="senha" id="senha" aria-describedby="basic-addon1">
		</div>

		<button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
	</form>
</div>

<?php require_once 'pages/footer.php'; ?>