<?php

class Atleta implements ActiveRecord{

    private int $id;
    
    public function __construct(private string $nome,private date $data_nasc, private string $turma, private int $altura, private string $posicao, private string $foto, private string $email, private string $senha, private string $sexo){
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function setData_nasc(string $data_nasc):void{
        $this->data_nasc = $data_nasc;
    }

    public function setTurma(string $turma):void{
        $this->turma = $turma;
    }

    public function setAltura(string $altura):void{
        $this->altura = $altura;
    }

    public function setPosicao(string $posicao):void{
        $this->posicao = $posicao;
    }

    public function setFoto(string $foto):void{
        $this->foto = $foto;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function setSexo(string $sexo):void{
        $this->sexo = $sexo;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function getData_nasc():string{
        return $this->data_nasc;
    }

    public function getTurma():string{
        return $this->turma;
    }

    public function getAltura():date{
        return $this->altura;
    }

    public function getPosicao():string{
        return $this->posicao;
    }

    public function getFoto():string{
        return $this->foto;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function getSexo():string{
        return $this->sexo;
    }


    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE atletas SET nome = '{$this->nome}' ,data_nasc = '{$this->data_nasc}',turma = '{$this->turma}',altura = '{$this->altura}',posicao = '{$this->posicao}',foto = '{$this->foto}',email = '{$this->email}',senha = '{$this->senha}',sexo = '{$this->senha}' WHERE id = {$this->id}";
        }else{
            $sql = "INSERT INTO atletas (nome,data_nasc,turma,altura,posicao,foto,email,senha,sexo) VALUES ('{$this->nome}','{$this->data_nasc}','{$this->turma}','{$this->altura}','{$this->posicao}','{$this->foto}','{$this->email}','{$this->senha}','{$this->sexo}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM atletas WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Atleta{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atletas WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $p = new Atleta($resultado[0]['nome'],$resultado[0]['data_nasc'],$resultado[0]['turma'],$resultado[0]['altura'],$resultado[0]['posicao'],$resultado[0]['posicao'],$resultado[0]['foto'],$resultado[0]['email'],$resultado[0]['senha'],$resultado[0]['sexo']);
        $p->setId($resultado[0]['id']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atletas";
        $resultados = $conexao->consulta($sql);
        $atletas = array();
        foreach($resultados as $resultado){
            $p = new Atleta($resultado[0]['nome'],$resultado[0]['data_nasc'],$resultado[0]['turma'],$resultado[0]['altura'],$resultado[0]['posicao'],$resultado[0]['posicao'],$resultado[0]['foto'],$resultado[0]['email'],$resultado[0]['senha'],$resultado[0]['sexo']);
            $p->setId($resultado['id']);
            $atletas[] = $p;
        }
        return $atletas;
    }

    
}
