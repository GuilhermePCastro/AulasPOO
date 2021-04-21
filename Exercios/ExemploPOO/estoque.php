<?php

require_once('./classes/usuario.class.php');
require_once('./classes/fabricante.class.php');
require_once('./classes/movimentacao.class.php');
require_once('./classes/estoque.class.php');
require_once('./classes/produto.class.php');

class Main{

    private $objUsuario;
    private $objFabricante;
    private $objMovimentacao;
    private $objEstoque;
    private $objProduto;

    function __construct(){

        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objMovimentacao = new Movimentacao;
        $this->objEstoque = new Estoque;
        $this->objProduto = new Produto;

        //pegando o segunfo argumento que o usuário envia
        //O primeiro argumunte é o próprio arquivo
        
        $this->verificaArg(1);
        $this->executaOperacao($_SERVER['argv']['1']);

    }

    private function executaOperacao(string $operacao){
        
        switch ($operacao){

            case 'gravaUsuario':
                $this->gravaUsuario();
                break;

            case 'editaUsuario':
                $this->gravaUsuario();
                break;

            case 'listaUsuario':
                $this->listaUsuario();
                break;
             
            case 'apagaUsuario':
                $this->apagaUsuario();
                break;

            default:
                echo "\nERRO: Não existe a funcionalidade {$operacao}\n";
        }

    }

    private function verificaArg($arg){
        
        if(!isset($_SERVER['argv'][$arg])){

            if($arg == 1){
                $msg = "Para utilizar o programa digite: php estoque.php [operacao]";
            }else{
                $msg = "Para utilizar o programa digite: php estoque.php [operacao] [parâmetros]";
            }

            echo "\n\nERROR - $msg \n\n";
            exit();
        }
    }

    private function pegaParms(): array{

        $this->verificaArg(2);

        //Dados passados pelo usuário
        $args=explode(',' , $_SERVER['argv']['2']);

        foreach($args as $valor){
            $arg = explode('=', $valor);

            $dados[$arg[0]] = $arg[1];
        }

        return $dados;
    }

    private function apagaUsuario(){
        
        $dados = $this->pegaParms();
        $this->objUsuario->setDados($dados);
        $this->objUsuario->delete();


    }

    private function listaUsuario(){
        
        $lista = $this->objUsuario->getAll();

        echo "id\t|Nome\t|CPF\n";
        echo "---------------------------------\n";
        foreach($lista as $usu){
            echo "{$usu['id']}\t|{$usu['ds_nome']}\t|{$usu['nr_cpf']}\n";
        }

    }

    private function gravaUsuario(){
        
        $dados = $this->pegaParms();

        $this->objUsuario->setDados($dados);
        $this->objUsuario->gravarDados();

    }

    function __destruct(){
    }
}  

new Main;