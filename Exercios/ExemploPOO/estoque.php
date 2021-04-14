<?php

require_once('./classes/usuario.class.php');
require_once('./classes/fabricante.class.php');
require_once('./classes/movimentacao.class.php');
require_once('./classes/estoque.class.php');
require_once('./classes/produto.class.php');

class Main{

    function __construct(){

        $objUsuario = new Usuario;
        $objFabricante = new Fabricante;
        $objMovimentacao = new Movimentacao;
        $objEstoque = new Estoque;
        $objProduto = new Produto;

        //pegando o segunfo argumento que o usuário envia
        //O primeiro argumunte é o próprio arquivo
        switch ($_SERVER['argv']['1']){

            case 'gravaUsuario':
                $this->gravaUsuario($objUsuario, 'Usuário criado');
                break;

            case 'editaUsuario':
                $this->gravaUsuario($objUsuario, 'Usuário alterado');
                break;
             
            default:
                echo "\nERRO: Não existe a funcionalidade {$_SERVER['argv']['1']}\n";
        }
    }

    public function pegaParms(): array{
        //Dados passados pelo usuário
        $args=explode(',' , $_SERVER['argv']['2']);

        foreach($args as $valor){
            $arg = explode('=', $valor);

            $dados[$arg[0]] = $arg[1];
        }

        return $dados;
    }

    public function gravaUsuario($objUsuario, $mens){
        
        $dados = $this->pegaParms();

        $objUsuario->setDados($dados);
        if($objUsuario->gravarDados()){
            echo "$mens";
        }
    }

    function __destruct(){
    }
}  

new Main;