<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- Font Awesome icons (versão gratuita)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- Estilo pessoal -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<meta charset="UTF-8">
	<title>Classificados</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark"">
	<div class="container-fluid" id="menuMargem">
		<div class="navbar-header">
			<a href="./" class="navbar-brand">Classificados</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>	
				<li class="nav-item"><a class="nav-link">Bem-vindo(a) <?php
				require_once 'classes/usuarios.classes.php';
        		$u = new Usuarios();
        		$nameuser = $u->getNamelogin();
        		echo $nameuser['nome'];
				?>				
				</a></li>		
				<li class="nav-item"><a class="nav-link" href="meus-anuncios.php">Meus Anúncios</a></li>
				<li class="nav-item"><a class="nav-link" href="sair.php">Sair</a></li>
			<?php else: ?>
				<li class="nav-item"><a class="nav-link" href="cadastre-se.php">Cadastre-se</a></li>
				<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>


  
				