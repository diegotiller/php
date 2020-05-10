<?php 

$arquivo = $_FILES['arquivo'];
echo "<pre>";
print_r($arquivo);

if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
	move_uploaded_file($arquivo['tmp_name'], 'arquivos/'. $arquivo['name']);
	echo "Arquivo enviado com sucesso!";

}else{
	print_r($arquivo);
	echo "Falha no envio!";
}

?>