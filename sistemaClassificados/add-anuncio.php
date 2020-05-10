<?php require_once 'pages/header.php'; ?>
<?php 
if (empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

require_once 'classes/anuncios.classes.php';
$a = new Anuncios();
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	$estado = addslashes($_POST['estado']);

	$a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
	?>
	<div class="alert alert-success">
		Produto adicionado com sucesso!
	</div>
	<?php
}
?>
<div class="container">
	<h1>Meus Anúncios - Adicionar Anúncio</h1>
	<form method="POST" enctype="multpart/form-data">
		<div class="form-group">
			<label for="categoria">Categorias:</label>
			<select name="categoria" id="categoria"  class="form-control">
				<?php 
				require_once 'classes/categorias.classes.php';
				$c = new Categorias();
				$cats = $c->getLista();
				foreach ($cats as $cat):
				?>
				<option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control">
		</div>

		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control">
		</div>

		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea name="descricao" id="descricao" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="estado">Estado de Conservação:</label>
			<select name="estado" id="estado"  class="form-control">
				<option value="1">Ruim</option>
				<option value="2">Bom</option>
				<option value="3">Ótimo</option>
			</select>
		</div>

		<button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
	</form>
</div>
<?php require_once 'pages/footer.php'; ?>