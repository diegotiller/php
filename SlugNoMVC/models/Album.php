<?php 
class Album extends model {
	public function getLista(){
		$array = array();

		$sql = $this->db->query("SELECT * FROM albuns");
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getAlbum($slug){
		$array = array();

		$sql = $this->db->prepare("SELECT titulo FROM albuns WHERE slug = :slug");
		$sql->bindValue(":slug", $slug);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array['album'] = $sql->fetch();
		}

		return $array;
	}
}