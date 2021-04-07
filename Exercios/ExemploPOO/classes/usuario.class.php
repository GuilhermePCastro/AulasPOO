<?php 

require_once(__DIR__ . '/../interfaces/usuario.interface.php');
require_once(__DIR__ . '/abstratas/tipoPessoa.class.php');

Class Usuario implements iUsuario{

    public function setDados(array $dados):bool{
        return true;
    }

    public function getDados(int $id_usuario):array{
        return [];
    }

}