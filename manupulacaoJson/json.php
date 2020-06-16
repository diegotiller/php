<?php 
$json = file_get_contents("http://apiadvisor.climatempo.com.br/api/v1/anl/synoptic/locale/BR?token=2a32326945ec6c246a650cb2c4e84687");
echo $json;

$json = json_decode($json);

$obj = new stdClass();
$obj->country = "US";
$obj->date = "2020-06-14";
$obj->text = "Está frio";

$json[] = $obj;


echo "<pre>";
print_r($json);
echo "</pre>";

echo "<br>";
foreach ($json as $chave => $valor) {
	echo "<pre>";
	var_dump($valor);

	echo "<br><br>";

	echo "Sigla pais: ".$valor->country."<br><br>";
	echo "Data solicitação da previsão: ".$valor->date."<br><br>";
	echo "Previsão: ".str_replace(".", ".<br>", $valor->text)."<br><br>";
	echo "</pre>";	
}

echo "<br>";
echo json_encode($json);


//criando json
$json1 = array(
	"nome"=>"Diego",
	"sobrenome"=>"Tiller",
	"idade"=>"33"
);

echo json_encode($json1);
