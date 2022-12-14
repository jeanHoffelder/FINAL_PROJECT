<?php

class Administrador implements ActiveRecord{

    private int $id;
    private string $senha;
    
    public function __construct(private string $email){
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
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
        $p = new Administrador($resultado[0]['email'],$resultado[0]['senha']);
        $p->setId($resultado[0]['id']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM administrador";
        $resultados = $conexao->consulta($sql);
        $administrador = array();
        foreach($resultados as $resultado){
            $p = new Administrador($resultado[0]['email'],$resultado[0]['senha']);
            $p->setId($resultado['id']);
            $administrador[] = $p;
        }
        return $administrador;
    }

    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT * FROM administrador WHERE email = '{$this->email}'";
        $resultados = $conexao->consulta($sql);

        if($this->senha==$resultados[0]['senha']){
            session_start();
            $_SESSION['email'] = $resultados[0]['email'];
            $_SESSION['id'] = $resultados[0]['id'];

        if(password_verify($this->senha,$resultados[0]['senha'])){
            session_start();
            $_SESSION['id'] = $resultados[0]['id'];
            $_SESSION['email'] = $resultados[0]['email'];
            $_SESSION['nome'] = $resultados[0]['nome'];

            return true;
        }else{
            return false;
        }
    }
    
}
}