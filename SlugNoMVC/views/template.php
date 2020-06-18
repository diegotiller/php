<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Meu Site</title>
	<!-- Font Awesome icons (versão gratuita)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<h1>Topo</h1>
			</div>
			<div class="row">
				<a href="<?php echo BASE_URL; ?>home">Home</a>
				&nbsp;&nbsp;
				<a href="<?php echo BASE_URL; ?>galeria">Galeria</a>
			</div>
		</div>

		<?php $this->loadViewInTemplate($viewName, $viewData); ?>

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>