<?php

abstract class Pessoa{

    protected $nome;
    protected $endereco;

    public function enviaCorrespondecia(){
        echo "carta<br>";
        echo "carta -----><br>";
        echo "carta ------------><br>";
        echo "carta -----------------><br>";
        echo "carta ---------------------------><br>";
        echo "carta --------------------------------> Destino";

    }

    public function recebeCorrespondecia(){

    }

}

class PessoaFisica extends Pessoa{

    private $cpf;
    private $imc;

    public function enviaCorrespondecia(){
        echo "Chama o Loggi<br>";
        echo "entrega ao motoboy<br>";
        echo "Chega ao destino<br>";


    }

    public function praticarExercicio(){

    }

    public function comer(){
        
    }
}


class PessoaJuridica extends Pessoa{

    private $cnpj;
    private $nomeFantasia;

    public function abrirFilial(){

    }

    public function fecharFilial(){
        
    }
}

$joao = new PessoaFisica;
$joao->enviaCorrespondecia();