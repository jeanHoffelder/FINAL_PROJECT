<?php

class Administrador implements ActiveRecord{

    private int $id;
    
    public function __construct(private string $email, private string $senha){
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE administrador SET email = '{$this->email}',senha = '{$this->senha}' WHERE id = {$this->id}";
        }else{
            $sql = "INSERT INTO administrador (email,senha) VALUES ('{$this->email}','{$this->senha}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM administrador WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Administrador{
        $conexao = new MySQL();
        $sql = "SELECT * FROM administrador WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $p = new Adminsitrador($resultado[0]['email'],$resultado[0]['senha']);
        $p->setId($resultado[0]['id']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM adminsitrador";
        $resultados = $conexao->consulta($sql);
        $administrador = array();
        foreach($resultados as $resultado){
            $p = new Administrador($resultado[0]['email'],$resultado[0]['senha']);
            $p->setId($resultado['id']);
            $administrador[] = $p;
        }
        return $administrador;
    }

    
}
