<?php
class Fotos extends model {

	public function getFotos() {
		$array = array();
		$sql = $this->db->query("SELECT * FROM galeria_fotos ORDER BY id DESC");

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	// public function getAutorFoto($id_usuario) {
	// 	$array = array();

	// 	$sql = $this->db->prepare("SELECT nome FROM usuarios WHERE id = :id_usuario");
	// 	$sql->bindValue(":id_usuario", $id_usuario);
	// 	$sql->execute();
		
	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}
	// 	return $array; 
	// }

	public function saveFotos() {
		if (isset($_FILES['galeriaFoto']) && !empty($_FILES['galeriaFoto']['tmp_name'])) {
			$permitidos = array('image/jpg', 'image/png', 'image/jpeg');
			
			if (in_array($_FILES['galeriaFoto']['type'], $permitidos)) {
				$nome = md5(time().rand(0,9999)).'.jpg';

				move_uploaded_file($_FILES['galeriaFoto']['tmp_name'], 'assets/images/galeria/'.$nome);

				$titulo = '';
				if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
					$titulo = addslashes($_POST['titulo']);
				}

				$sql = $this->db->prepare("INSERT INTO galeria_fotos set titulo = :titulo, url = :url, id_usuario = :id_usuario");
				$sql->bindValue(":titulo", $titulo);
				$sql->bindValue(":url", $nome);
				$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
				$sql->execute();
			}
		}
		
	}
}