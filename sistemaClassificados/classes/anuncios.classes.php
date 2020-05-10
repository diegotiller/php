<?php 
//Classe dos anúncios
class Anuncios{
	//Método para exibir total anúncios
	public function getTotalAnuncios($filtros) {
		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Verificação de filtros ativos caso estejam
		//Cria um array 1=1 para não haver erro de sintax caso não haja filtro selecionado pois depois do WHERE se ficar em branco ocasionará erro
		$filtroString = array('1=1');
		//Verificação filtro categoria
		if (!empty($filtros['categoria'])) {
			$filtroString[] = 'anuncios.id_categoria = :id_categoria';
		}
		//Verificação filtro preço
		if (!empty($filtros['preco'])) {
			$filtroString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
		}
		//Verificação filtro estado de conservação
		if (!empty($filtros['estado'])) {
			$filtroString[] = 'anuncios.estado = :estado';
		}

		//Consulta ao banco para contar numero de linhas e coloca em c
		$sql = $pdo->prepare("SELECT COUNT(*) as c FROM anuncios WHERE ".implode(' AND ', $filtroString));

		//Verificação filtro categoria
		if (!empty($filtros['categoria'])) {
			$sql->bindValue(':id_categoria', $filtros['categoria']);
		}
		//Verificação filtro preço
		if (!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(':preco1', $preco[0]);
			$sql->bindValue(':preco2', $preco[1]);
		}
		//Verificação filtro estado de conservação
		if (!empty($filtros['estado'])) {
			$sql->bindValue(':estado', $filtros['estado']);
		}

		$sql->execute();
		$row = $sql->fetch();
		//Retorna a variavel $row com o numero de linhas  do banco de dados
		return $row['c'];
	}

	//Método para listar os anúncios
	public function getUltimosAnuncios($page, $perPage, $filtros){

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Paginação da página index
		$offset = ($page - 1) * $perPage;

		//Cria um array vazio para que caso não haja anúncios não de erro
		$array = array();

		//Verificação de filtros ativos caso estejam
		//Cria um array 1=1 para não haver erro de sintax caso não haja filtro selecionado pois depois do WHERE se ficar em branco ocasionará erro
		$filtroString = array('1=1');
		//Verificação filtro categoria
		if (!empty($filtros['categoria'])) {
			$filtroString[] = 'anuncios.id_categoria = :id_categoria';
		}
		//Verificação filtro preço
		if (!empty($filtros['preco'])) {
			$filtroString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
		}
		//Verificação filtro estado de conservação
		if (!empty($filtros['estado'])) {
			$filtroString[] = 'anuncios.estado = :estado';
		}

		//Query de busca para a url das imagens dos anúncios no banco de dados
		$sql = $pdo->prepare("SELECT 
			*, 
			(SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id LIMIT 1) as url,
			(SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria) as categoria 
			FROM anuncios WHERE ".implode(' AND ', $filtroString)." ORDER BY id DESC LIMIT $offset, $perPage");
		//Verificação filtro categoria
		if (!empty($filtros['categoria'])) {
			$sql->bindValue(':id_categoria', $filtros['categoria']);
		}
		//Verificação filtro preço
		if (!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(':preco1', $preco[0]);
			$sql->bindValue(':preco2', $preco[1]);
		}
		//Verificação filtro estado de conservação
		if (!empty($filtros['estado'])) {
			$sql->bindValue(':estado', $filtros['estado']);
		}
		$sql->execute();

		//Verifica se existe anúncio(s) no banco de dados
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		//Retorna a variável array preenchida ou vazia
		return $array;
	}

	//Método para listar os ultimos anúncios por categoria
	public function getUltimosAnunciosCategoria(){

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Cria um array vazio para que caso não haja anúncios não de erro
		$array = array();

		//Query de busca para a url das imagens dos anúncios no banco de dados
		$sql = $pdo->prepare("SELECT 
			*, 
			(SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id LIMIT 1) as url,
			(SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria) as categoria 
			FROM anuncios ORDER BY id DESC LIMIT 10");
		$sql->execute();

		//Verifica se existe anúncio(s) no banco de dados
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		//Retorna a variável array preenchida ou vazia
		return $array;
	}	

	//Método para buscar no banco de dados a url das fotos dos anúncios para levar a página meus-anuncios.php
	public function getMeusAnuncios(){

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Cria um array vazio para que caso não haja anúncios não de erro
		$array = array();

		//Query de busca para a url das imagens dos anúncios no banco de dados
		$sql = $pdo->prepare("SELECT 
			*, 
			(SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id LIMIT 1) as url 
			FROM anuncios 
			WHERE id_usuario = :id_usuario");
		$sql->bindValue(':id_usuario', $_SESSION['cLogin']);
		$sql->execute();

		//Verifica se existe anúncio(s) no banco de dados
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		//Retorna a variável array preenchida ou vazia
		return $array;
	}

	//Método para buscar os anúncios no banco de dados e envia-los a página meus-anuncios.php
	public function getAnuncio($id) {

		//Cria a variável $array com um array vazio para não dar erro o retorno da função
		$array = array();

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Seleciona os anúncios no banco de dados caso exista algum
		$sql = $pdo->prepare("SELECT 
							*,
							(SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria) as categoria
							FROM anuncios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		//Verifica se existe algum anúncio
		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();

			//Array vazio para caso não haja fotos
			$array['fotos'] = array();

			//Consulta banco de dados para exibir as fotos dos produtos
			$sql = $pdo->prepare("SELECT id,url FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
			$sql->bindValue(":id_anuncio", $id);
			$sql->execute();

			//Verifica se existe fotos
			if ($sql->rowCount() > 0) {
				$array['fotos'] = $sql->fetchAll();
			}
		}

		//Retorna a variável -preenchida ou vazia
		return $array;
	}

	//Pegar dados do Proprietario do usuario para  colocar no anúncios
	public function infoUsuarioAnuncio($id) {
		//Global criada no arquivo config para conexão com o banco de dados
    	global $pdo;

    	//Seleciona o nome, email e telefone do usuário pelo id
    	$sql = $pdo->prepare("SELECT id_usuario FROM anuncios WHERE id = :id");
    	$sql->bindValue(":id", $id);
    	$sql->execute();
    	//Verifica se se houve algum retorno na consulta sql
    	if($sql->rowCount() > 0) {
    		//Coloca o id do usuário na variavel $usuarioAnuncio
    		$row = $sql->fetch();
    		$usuarioAnuncio = $row['id_usuario'];
    		//Faz nova consulta ao banco de dados com o id do usuário para pegar dados
    		$sql = $pdo->prepare("SELECT nome,telefone,email FROM usuarios WHERE id = :id");
    		$sql->bindValue(":id", $usuarioAnuncio);
    		$sql->execute();

    		if ($sql->rowCount() > 0) {
    			$usuarioDados = $sql->fetch();
    		}
    	}
    	//Retorna variável com o nome do usuário
    	return $usuarioDados;
    }

	//Método para adicionar anúncios
	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado) {

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Query que insere anúncio novo ao banco de dados
		$sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_usuario = :id_usuario, id_categoria = :id_categoria, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute();
	}

	//Método para editar anúncios
	public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id) {

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Query de atualização dos anúncios
		$sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_usuario = :id_usuario, id_categoria = :id_categoria, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);		
		$sql->bindValue(":id", $id);
		$sql->execute();

		//Verificação se houve envio de fotos
		if(count($fotos > 0)) {

			//Coloca todas as fotos originais dentro da variável $i
			for ($i=0; $i < count($fotos['tmp_name']); $i++) { 

				//Coloca o tipo de foto na variável $tipo
				$tipo = $fotos['type'][$i];

				//Verifica se o tipo de foto esta contido dento do array('image/jpeg', 'image/png')
				if(in_array($tipo, array('image/jpeg', 'image/png'))) {

					//Muda o nome da foto para um hash aleatório de 32 caracteres
					$tmpname = md5(time().rand(0,9999)).'.jpg';

					//Move a foto com seu novo nome para a pasta destino
					move_uploaded_file($fotos['tmp_name'][$i], 'assets/img/anuncios/'.$tmpname);

					//Redimensionamento da imagem
					//Pega a largura original da imagem $width_orig, pega a altura original da imagem $height_orig
					list($width_orig, $height_orig) = getimagesize('assets/img/anuncios/'.$tmpname);

					//Divide a largura pela altura para saber como redimensionar a imagem
					$ratio = $width_orig/$height_orig;

					//Definindo limite de largura $width e altura $height da imagem definidos em px
					$width = 500;
					$height = 500;

					//Verifica se a largura original da foto que precisa ser alterada para manter a proporção da imagem
					if ($width/$height > $ratio) {
						$width = $height*$ratio;
					}

					//Caso contrario a altura da foto que precisa ser alterada para manter a proporção da imagem
					else{
						$height = $width/$ratio;
					}

					//Criando a nova imagem com os limites definidos
					$img = imagecreatetruecolor($width, $height);

					//Carregando a imagem original no PHPGD e verificando se ela é .jpg ou .png
					//Caso a imagem seja jpg
					if ($tipo == 'image/jpeg') {
							$origi = imagecreatefromjpeg('assets/img/anuncios/'.$tmpname);
						}

						//Caso a imagem seja png
						elseif ($tipo == 'image/png') {
							$origi = imagecreatefrompng('assets/img/anuncios/'.$tmpname);
						}

						//Inserindo a imagem original dentro da nova imagem com o tamanho correto
						imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

						//Salvando a nova imagem com qualidade de 80 que é padrão pra .jpg pois fica com qualidade boa e otimizada 
						imagejpeg($img, 'assets/img/anuncios/'.$tmpname, 80);

						//Salvando nome da imagem no banco de dados
						$sql = $pdo->prepare("INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url");

						//id_anuncio recebe a variável $id que vem via get
						$sql->bindValue(":id_anuncio", $id);

						//url recebe o novo nome da imagem criada a cima
						$sql->bindValue(":url", $tmpname);
						$sql->execute();
				}
			}
		}
	}

	//Método para excluir anúncios
	public function excluirAnuncio($id) {

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Criando o array vazio como prevenção
		$array = array();

		//Pegar o nome das imagens no banco de dados
		$sql = $pdo->prepare("SELECT url FROM anuncios_imagens WHERE id_anuncio = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		//Percorrendo o array com nome das imagens
		foreach ($array as $excluiArquivo) {

			//Monta a variavel com o nome da foto a ser excluida
			$excluiFoto = 'assets/img/anuncios/'.$excluiArquivo["url"];
			if( file_exists( $excluiFoto ) ){

				//Apaga o arquivo no diretório
				unlink($excluiFoto);
			}			
		}

		//Query de consulta ao banco de dados para a exclusão da url do anúncio
		$sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
		$sql->bindValue(":id_anuncio", $id);
		$sql->execute();

		//Query de consulta ao banco de dados para a exclusão do anúncio
		$sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	//Método excluir foto
	public function excluirFoto($id) {

		//Global criada no arquivo config para conexão com o banco de dados
		global $pdo;

		//Cria a variável id_anuncio como 0 para a variavel não estar indefinida
		$id_anuncio = 0;

		//Pegar o nome da imagem no banco de dados
		$sql = $pdo->prepare("SELECT url FROM anuncios_imagens WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$excluiArquivo = $sql->fetch();
		}

		//Monta a variavel com o nome da foto a ser excluida
		$excluiFoto = 'assets/img/anuncios/'.$excluiArquivo["url"];
		if( file_exists( $excluiFoto ) ){

			//Apaga o arquivo no diretório
			unlink($excluiFoto);
		}

		//Query pega de qual anúncio a foto pertence
		$sql = $pdo->prepare("SELECT id_anuncio FROM anuncios_imagens WHERE id = :id");
		
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$row = $sql->fetch();
			$id_anuncio = $row['id_anuncio'];
		}

		//Query de consulta ao banco de dados para a exclusão da foto do anúncio
		$sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		//Retorno verdadeiro caso a foto tenha sido excluida
		return $id_anuncio;		
	}
}
