<?php
$xml = simplexml_load_file("cidades.xml");

echo "<pre>";
print_r($xml);
echo "</pre>";

foreach ($xml->cidade as $chave => $valor) {
	echo "Nome da cidade: ".$valor->nome."<br>";
	echo "Sigla do Estado: ".$valor->uf."<br>";
	echo "ID Cidade: ".$valor->id."<br><br>";
}


//criando xml
function arrayToXml($data, &$xml_data){
	foreach ($data as $chave => $valor) {
		if (is_array($valor)) {
			if (is_numeric($valor)) {
				$chave = 'item'.$chave;
			}
			$subnode = $xml_data->addChild($chave);
			arrayToXml($valor, $subnode);
		}else{
			if (is_numeric($chave)) {
				$chave = 'item'.$chave;
			}
			$xml_data->addChild($chave, htmlspecialchars($valor));
		}	
	}
}

$xml1 = array(
	"nome"=>"Diego",
	"sobrenome"=>"Tiller",
	"idade"=>"33",
	"caracteristicas" => array(
		'amigo',
		'fiel',
		'companheiro',
		'legal'
	)
);

$xml_data = new SimpleXMLElement('<data/>');
arrayToXml($xml1, $xml_data);

$result = $xml_data->asXML();
echo $result;