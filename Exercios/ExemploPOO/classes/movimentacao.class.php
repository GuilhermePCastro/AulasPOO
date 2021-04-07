<?php 

require(__DIR__ . '/../interfaces/movimentacao.interface.php');

Class Movimentacao implements iMovimentacao{

    public function setDados(array $dados):bool{
        return true;
    }

    public function getDados(string $tipo, string $datahora, int $id_usu):array{
        return [];
    }

}