<?php 
ob_start();
?>

<h1>Olá Mundo!</h1>
<h4>Sub título etc...</h4>

<?php 
$html = ob_get_contents();
ob_end_clean();

require 'vendor/autoload.php';

$arquivo = md5(time().rand(0,9999)).'.pdf';

//$mpdf = new mPDF();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);

//$mpdf->Output();
$mpdf->Output($arquivo, 'F');

$link = 'http://localhost/bonniek_curso_php_completo/phpGit/RelatoriosEmPDF/'.$arquivo;

echo "Faca o download no link: <a href=".$link.">Clique Aqui para baixar!</a>"

//I = abra no browser é o padrão caso esteja vazia a opção
//D = faz o download do arquivo
//F = salva no servidor o arquivo.pdf

//https://mpdf.github.io/ documentação da biblioteca
?>

