<?php 

require(__DIR__ . '/../interfaces/fabricante.interface.php');
require_once(__DIR__ . '/abstratas/tipoPessoa.class.php');

Class Fabricante extends TipoPessoa implements iFabricante{

    public function setDados(array $dados):bool{
        return true;
    }

    public function getDados(int $id_fabricante):array{
        return [];
    }

}