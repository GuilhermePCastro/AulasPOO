<?php 

require_once(__DIR__ . '/../interfaces/usuario.interface.php');
require_once(__DIR__ . '/abstratas/tipoPessoa.class.php');

Class Usuario extends TipoPessoa implements iUsuario{

    protected $cpf; 
    protected $nome;
    protected $id;

    public function __construct(){
        parent::__construct();
    }

    public function setDados(array $dados):bool{

        $this->cpf = $dados['cpf'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->id = $dados['id'] ?? null;

        return true;
    }

    public function gravarDados(): bool{

        if(empty($this->id)){
            return $this->insert();
        }else{
            return $this->update();
        }

    }

    public function insert():bool {

        $stmt = $this->prepare('INSERT INTO tb_usuario 
                                    (nr_cpf, ds_nome)
                                VALUES 
                                    (:cpf, :nome)
                            ');

        if($stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome])){
            return true;
        }else{
            return false;
        }

    }

    public function update():bool {

         $stmt = $this->prepare('UPDATE tb_usuario SET
                                    nr_cpf  = :cpf,
                                    ds_nome = :nome
                                WHERE
                                    id = :id
                            ');

        if($stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome, ':id' => $this->id])){
            return true;
        }else{
            return false;
        }

    }

    public function getDados(int $id_usuario):array{
        return ['id' => $this->id, 'nome' => $this->nome, 'cpf' => $this->cpf ];
    }

}