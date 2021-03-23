<?php

interface iPessoaFitness{

    public function setDados(string $nomeset, int $idadeset,  float $alturaset, float $pesoset);
    public function getDados();
    public function calcIMC();
}


class PessoaFitness implements iPessoaFitness{

    protected $nome;
    protected $idade;
    protected $altura;
    protected $peso;

    public function setDados($nomeset, $idadeset, $alturaset, $pesoset):bool{
        
        $this->nome    = $nomeset;
        $this->idade   = $idadeset;
        $this->altura  = $alturaset;
        $this->peso    = $pesoset;
        return true;
    }

    public function getDados(): array{
        return $dados = [   'nome'   =>  $this->nome,
                            'idade'  =>  $this->idade,
                            'altura' =>  $this->altura,
                            'peso'   =>  $this->peso];
    }

    public function calcIMC():float{
        $imc = round($this->peso/( $this->altura *  $this->altura),2);
        return $imc;
    }

}

class Atleta extends PessoaFitness{

    private $modalidade;

    public function setModalidade($modalidade):bool{
        $this->modalidade = $modalidade;
        return true;
    }

    public function getModalidade():string{
        return $this->modalidade;
    }

}

class CBAt{

    private $objAtleta;
    

    public function __construct($objAtleta){
        echo "Tô construindo";

        $this->objAtleta = $objAtleta;
    }

    public function pegaAtleta(){
        $dados = $this->objAtleta->getDados();
        return $dados['nome'];
    }

    public function __destruct(){
        echo "Vamo derrubaaaaar!!";
    }
}

class Torneio{

    private $nome;

    public function pegaAtleta($objCBAt){
        return $objCBAt->pegaAtleta();
    }
}

//classe com herança
$pessoa = new Atleta;
$pessoa->setDados('Guilherme', 18, 1.82, 88);
$dados = $pessoa->getDados();
$pessoa->setModalidade('Futebol');

echo  $dados['nome'] .', seu IMC é ' . $pessoa->calcIMC();
echo '</br></br>';

//classe com dependecia
$CBAt = new CBAt($pessoa);
echo '</br></br>';
echo  $dados['nome'] .', sua modalidade é ' . $pessoa->getModalidade();
echo '</br></br>';

//Classe com associação
$torneio = new Torneio;
$nome = $torneio->pegaAtleta($CBAt);
echo "Seu nome é $nome";
echo '</br></br>';