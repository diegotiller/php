<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $items = new Items();

        $limit = 10;

        $total = $items->getTotal();
        $data['paginas'] = ceil($total/$limit);

        $data['paginaAtual'] = 1;
        if(!empty($_GET['p'])) {
        	$data['paginaAtual'] = intval($_GET['p']);
        }

        $offset = ($data['paginaAtual'] * $limit) - $limit;

        $data['lista'] = $items->getList($offset, $limit);

        $this->loadTemplate('home', $data);
    }

}