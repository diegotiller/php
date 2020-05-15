<?php
class Pessoa {
	private $nome;
	private $idade;

	public static function getInstancia() {
		static $instancia = null;
		if ($instancia === null) {
			$instancia = new Pessoa();
		}
		return $instancia;
	}

	private function __construct() {

	}

	public function setNome($n) {
		$this->nome = $n;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setIdade($i) {
		$this->idade = $i;
	}

	public function getIdade() {
		return $this->idade;
	}
}

$nomePessoa = Pessoa::getInstancia();
$nomePessoa->setNome("Diego");

//Funcionando
echo "Nome: ".$nomePessoa->getNome()."<br><br>";

//Usando a mesma instancia em outro lugar do sistema
$nomePessoa2 = Pessoa::getInstancia();
echo "Nome 2: ".$nomePessoa2->getNome()."<br><br>";
$nomePessoa2->setIdade(30);

//Não importa a variavel que use ela irá substituir os dados pois é uma unica instância
$nomePessoa3 = Pessoa::getInstancia();

echo "Idade :".$nomePessoa->getIdade();


