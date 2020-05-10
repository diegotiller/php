<?php require_once 'pages/header.php'; ?>

<?php  
require_once 'classes/anuncios.classes.php';
require_once 'classes/usuarios.classes.php';
$a = new Anuncios();
$u = new Usuarios();

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);
}else{
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

//Pega todas as informações do anuncio
$info = $a->getAnuncio($id);

//Separa apenas as chaves do array fotos na variavel $indicadores
$indicadores = array_keys($info["fotos"]);

//Exibe 10 ultimos anúncios da categoria
$ultimosAnunciosCategoria = $a->getUltimosAnunciosCategoria();

//Recebe os dados do proprietário do anuncio
$usuarioAnuncio = $a->infoUsuarioAnuncio($id);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-5">

			<div id="meuCarousel" class="carousel slide" data-ride="carousel">				
  				<div class="carousel-inner">  										
					<ol class="carousel-indicators">
						<?php foreach ($indicadores as $indicador):	?>
    					<li data-target="#meuCarousel" data-slide-to="<?php echo $indicador; ?>" <?php echo ($indicador=='0')?'class="active"':''; ?>></li>
    					<?php endforeach; ?>
  					</ol>

  					<?php
					foreach ($info['fotos'] as $chave => $foto):
					?>
   			 		<div class="carousel-item <?php echo ($chave=='0')?'active':''; ?>">
   			   			<img class="d-block w-100" src="assets/img/anuncios/<?php echo $foto['url']; ?>">
   			 		</div>
   			 		<?php 
					endforeach;
					?>
  				</div>				

  				<a class="carousel-control-prev" href="#meuCarousel" role="button" data-slide="prev">
  			  	<div class="iconeVoltar">
  			  		<!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
  			  		<span class="navCarouselVoltar"><i class="fas fa-arrow-circle-left"></i></span>
  			  	</div>
  			  	<span class="sr-only">Previous</span>
  				</a>
  				<a class="carousel-control-next" href="#meuCarousel" role="button" data-slide="next">
  			  	<div class="iconeAvancar">
  			  		<!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
  			  		<span class="navCarouselAvancar"><i class="fas fa-arrow-circle-right"></i></span>
  			  	</div>
  			  	<span class="sr-only">Next</span>
 			 	</a>
			</div>

		</div>
		<div class="col-sm-7">
			<h1><?php echo $info['titulo']; ?></h1>
			<h4><i class="fas fa-tag"></i> &nbsp; <?php echo utf8_encode($info['categoria']); ?></h4>			
			<h5><i class="fas fa-edit"></i> &nbsp; <?php echo $info['descricao']; ?></h5>
			<br>
			<h3><i class="fas fa-dollar-sign"></i> &nbsp; R$ <?php echo number_format($info['valor'], 2); ?></h3>
			<br>
			<h4><i class="fas fa-id-card"></i> &nbsp; Dados Anunciante</h4>
			<h5><i class="fas fa-user-alt"></i> &nbsp; <?php echo ($usuarioAnuncio['nome']); ?></h5>
			<h5><i class="fas fa-phone"></i> &nbsp; <?php echo $usuarioAnuncio['telefone']; ?></h5>
			<h5><i class="fas fa-envelope"></i> &nbsp; <?php echo $usuarioAnuncio['email']; ?></h5>
		</div>
	</div>
</div>

<!-- Container que exibe ultimos produtos adicionados da categoria -->
<div class="container" id="containerTempateProduto">
	<div class="row">
		<div class="col-12">

			<h4>Últimos Anúncios da Categoria</h4>
			<table class="table table-striped table-hover">
				<tbody>
					<?php foreach($ultimosAnunciosCategoria as $anuncio): 
					if ($anuncio['categoria'] == $info['categoria'] && $anuncio['id'] != $id):
					?>

					<tr>
						<td class="align-middle" scope="row">
							<?php if (!empty($anuncio['url'])): ?>
								<img src="assets/img/anuncios/<?php echo $anuncio['url']; ?>" height="30" border="0">
							<?php else: ?>
								<img src="assets/img/default.png" height="30" border="0">
							<?php endif; ?>
						</td>
						<td>
							<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a>
							<br>
							<?php echo utf8_encode($anuncio['categoria']); ?>
						</td>
						<td class="align-middle"><?php echo number_format($anuncio['valor'], 2); ?></td>			
					</tr>
					<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
</div>
<?php require_once 'pages/footer.php'; ?>