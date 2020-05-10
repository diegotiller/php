<?php require_once 'pages/header.php'; ?>

<div class="container">	
	<h1>Cadastre-se</h1>
	<?php 
	require_once 'classes/usuarios.classes.php';
	$u = new Usuarios();
	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);
		if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)) {
			if ($u->cadastrar($nome, $email, $senha, $telefone)) {
				var_dump($u); exit;
				?>
				<div class="alert alert-success" role="alert">
  					<strong>Parabéns</strong> seu cadastro foi feito com sucesso! <a href="login.php" class="alert-link">Faça seu login agora!</a>
				</div>
				<?php
			}else{
				?>
				<div class="alert alert-warning" role="alert">Este usuário já existe! <a href="login.php" class="alert-link">Faça seu login agora!</a></div>
				<?php
			}
		}else{
			?>
			<div class="alert alert-warning" role="alert">Preencha todos os campos!</div>
			<?php
		}
	}

	?>
	<form method="POST">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Nome: </span>
			</div>
			<input type="text" class="form-control" placeholder="Digite seu nome" aria-label="Digite seu nome" name="nome" id="nome" aria-describedby="basic-addon1">
		</div>

		<div class="input-group mb-3">
			<input type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="Digite seu e-mail" name="email" id="email" aria-describedby="basic-addon2">
			<div class="input-group-append">
			<span class="input-group-text" id="basic-addon2">@classificados.com.br</span>
			</div>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Senha: </span>
			</div>
			<input type="password" class="form-control" placeholder="Digite sua senha" aria-label="Digite sua senha" name="senha" id="senha" aria-describedby="basic-addon1">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Telefone: </span>
			</div>
			<input type="tel" class="form-control" placeholder="Telefone (99)99999-9999/(99)99999-9999" aria-label="Telefone (99)99999-9999/(99)99999-9999" name="telefone" id="telefone" aria-describedby="basic-addon1">
		</div>

		<button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
	</form>
</div>

<?php require_once 'pages/footer.php'; ?>