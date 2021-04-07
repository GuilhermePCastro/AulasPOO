<?php

require_once('./classes/usuario.class.php');
require_once('./classes/fabricante.class.php');
require_once('./classes/movimentacao.class.php');
require_once('./classes/estoque.class.php');
require_once('./classes/produto.class.php');

class Main{

    function __construct(){
        echo "Começou";
        
        $objUsuario = new Usuario;
        $objUsuario = new Fabricante;
        $objUsuario = new Movimentacao;
        $objUsuario = new Estoque;
        $objUsuario = new Produto;
    }

    function __destruct(){
        echo "Rodou";
    }
}  

new Main;