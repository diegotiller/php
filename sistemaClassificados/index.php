<?php require_once 'pages/header.php'; ?>

<?php  
require_once 'classes/anuncios.classes.php';
require_once 'classes/usuarios.classes.php';
require_once 'classes/categorias.classes.php';
$a = new Anuncios();
$u = new Usuarios();
$c = new Categorias();

//Recebendo filtros
$filtros = array(
	'categoria' => '',
	'preco' => '',
	'estado' => ''
);
if (isset($_GET['filtros'])) {
	$filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios($filtros);
$total_usuarios = $u->getTotalUsuarios();

//Criando paginação de produtos
$p = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}
//Parametros da paginação numero de post por pagina
$por_pagina = 3;
//Calculo para saber o número de páginas
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
?>

<div class="container-fluid">
	<div class="jumbotron">
		<h2 class="display-4">Nós temos hoje <?php echo $total_anuncios; ?> anúncios!</h2>
		<h4 class="lead">Mais de <?php echo $total_usuarios; ?> usuários cadastrados!</h4>
	</div>
	<div class="row">
		<!-- Coluna que exibe os filtros de pesquisa -->
		<div class="col-sm-3">
			<h4>Pesquisa Avançada</h4>
			<form method="GET">
				<!-- Filtro categorias -->
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select name="filtros[categoria]" id="categoria" class="form-control">
						<option value=""></option>
						<?php foreach ($categorias as $cat): ?>
						<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $filtros['categoria'])?'selected="selectez"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<!-- Filtro preço -->
				<div class="form-group">
					<label for="preco">Preço:</label>
					<select name="filtros[preco]" id="preco" class="form-control">
						<option value=""></option>
						<option value="0-50" <?php echo ($filtros['preco'] == '0-50')?'selected="selectez"':''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco'] == '51-100')?'selected="selectez"':''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco'] == '101-200')?'selected="selectez"':''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco'] == '201-500')?'selected="selectez"':''; ?>>R$ 201 - 500</option>
						<option value="501-1000" <?php echo ($filtros['preco'] == '501-1000')?'selected="selectez"':''; ?>>R$ 501 - 1000</option>
					</select>
				</div>

				<!-- Filtro estado de conservação -->
				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select name="filtros[estado]" id="estado" class="form-control">
						<option value=""></option>
						<option value="1" <?php echo ($filtros['estado'] == '1')?'selected="selectez"':''; ?>>Ruim</option>
						<option value="2" <?php echo ($filtros['estado'] == '2')?'selected="selectez"':''; ?>>Bom</option>
						<option value="3" <?php echo ($filtros['estado'] == '3')?'selected="selectez"':''; ?>>Ótimo</option>
					</select>
				</div>

				<button type="submit" class="btn btn-info btn-block">Buscar</button>
			</form>
		</div>

		<!-- Coluna que exibe produtos -->
		<div class="col-sm-9">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped table-hover">
				<tbody>
					<?php foreach($anuncios as $anuncio): ?>
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
					<?php endforeach; ?>
				</tbody>
			</table>

			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<!-- Voltar página -->
					<li class="page-item">
						<a class="page-link" href="index.php?<?php 
	 
						if(isset($_GET['p']) && $_GET['p'] > 1){
						    $w = $_GET;
							$w['p'] = $w['p'] - 1;
							echo http_build_query($w);
					    }else if(isset($_GET['p']) && $_GET['p'] == 1 || empty($_GET['p'])){
					    	$w = $_GET;
					    	echo http_build_query($w);
					    }
						?>" aria-label="Voltar">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Voltar</span>
						</a>				
					</li>

					<!-- Exibir página -->
					<?php for ($i=1; $i <= $total_paginas; $i++): ?>
					<!-- Colocar classe active na página atual -->
					<li class="page-item <?php echo ($p == $i)?'active':''; ?>"><a class="page-link" href="index.php?<?php 
					
					$w = $_GET;
					$w['p'] = $i;
					echo http_build_query($w); 
					
					?>"><?php echo $i; ?></a></li>
					<?php endfor; ?>
					
					<!-- Avançar página -->
					<li class="page-item">
						<a class="page-link" href="index.php?<?php 
	 
						if(isset($_GET['p']) && $_GET['p'] < $total_paginas){
						    $w = $_GET;
							$w['p'] = $w['p'] + 1;
							echo http_build_query($w);
					    }else if(isset($_GET['p']) && $_GET['p'] == $total_paginas){
					        $w = $_GET;
					        echo http_build_query($w);
					    }else if(empty($_GET['p'])){
					    	$_GET['p'] = 1;
							$w['p'] = $_GET['p'] + 1;
							echo http_build_query($w);
					    }

						?>" aria-label="Avançar">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Avançar</span>
						</a>					
					</li>				
				</ul>
			</nav>

		</div>
	</div>
</div>

<?php require_once 'pages/footer.php'; ?>


