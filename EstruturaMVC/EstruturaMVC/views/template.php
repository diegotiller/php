<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Meu Site</title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="<?php echo BASE_URL; ?>" class="navbar-brand">Classificados</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
					<li><a href="<?php echo BASE_URL; ?>anuncios">Meus Anúncios</a></li>
					<li><a href="<?php echo BASE_URL; ?>login/logout">Sair</a></li>
				<?php else: ?>
					<li><a href="<?php echo BASE_URL; ?>login/cadastrar">Cadastre-se</a></li>
					<li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
	
	<?php $this->loadInTemplate($viewName, $viewData); ?>
	
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>