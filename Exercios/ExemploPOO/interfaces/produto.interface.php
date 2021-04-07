<?php

interface iProduto{
    public function setDados(array $dados):bool;
    public function getDados(int $id_produto):array;

}