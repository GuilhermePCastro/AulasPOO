<?php 

require(__DIR__ . '/../interfaces/produto.interface.php');

Class Produto implements iProduto{

    public function setDados(array $dados):bool{
        return true;
    }

    public function getDados(int $id_produto):array{
        return [];
    }

}