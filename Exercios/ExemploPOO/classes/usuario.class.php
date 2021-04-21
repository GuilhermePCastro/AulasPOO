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
            echo "Usuário criado!";
            return true;
        }else{
            echo "Falha ao criar usuário!";
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
            echo "Usuário alterado!";
            return true;
        }else{
            echo "Falha ao alterar usuário " . $this->id . "!";
            return false;
        }

    }

    public function delete(): bool{

        $stmt = $this->prepare('DELETE FROM TB_USUARIO WHERE id = :id');
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            echo "Usuário $this->id apagado com sucesso!";
            return true;
        }else{
            echo "Erro ao apagar o usuário $this->id!";
            return false;
        }
    }

    public function getAll(): array{

        $stmt = $this->prepare('SELECT * FROM TB_USUARIO');

        if($stmt->execute()){
            $dados = $stmt->fetchAll();
            return $dados;
        }else{
            echo "Erro ao consultar";
            exit();
        }
    }

    public function getDados(int $id_usuario):array{
        return ['id' => $this->id, 'nome' => $this->nome, 'cpf' => $this->cpf ];
    }

}