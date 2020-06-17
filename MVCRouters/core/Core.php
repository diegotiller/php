<?php
class Core {
	public function run () {
		$url = '/';
		if (isset($_GET['url'])) {
			$url .= $_GET['url'];
		} 

		$url = $this->checkRoutes($url);

		$params = array();

		if (!empty($url) && $url != '/') {
			$url = explode("/", $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if (isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			}else{
				$currentAction = 'index';
			}
			if (count($url) > 0) {
				$params = $url;
			}
		}
		else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if (!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
		}

		$c = new $currentController();

		call_user_func_array(array($c, $currentAction), $params);



		echo "<hr/>";
		echo "Controller: ".$currentController."<br/>";
		echo "Action: ".$currentAction."<br/>";
		echo "Params: ".print_r($params, true)."<br/>";
	}

	public function checkRoutes($url){
		global $routes;
		foreach ($routes as $chave => $newUrl) {
			//Identificar os argumentos e substituir por regex
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9]{1,})', $chave);
            
            // faz o mach da url
			if (preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);

                //pega os argumentos que estão dentro de {} no arquivo routers.php
                $itens = array();
                if (preg_match_all('(\{[a-z0-9]{1,}\})', $chave, $m)) {
                	$itens = preg_replace('(\{|\})', '', $m[0]);
                }

                //faz associação entre o id e o valor
                $arg = array();
                foreach ($matches as $key => $match) {
                	$arg[$itens[$key]] = $match;
                }

                //montando nova url
                foreach ($arg as $argkey => $argvalue) {
                	$newUrl = str_replace(':'.$argkey, $argvalue, $newUrl);
                }

                $url = $newUrl;

                break;
			}
		}
		return $url;
	}
}