<?php

class Atleta implements ActiveRecord{

    private int $id;
    private string $nome;
    private string $data_nasc;
    private string $turma;
    private string $altura;
    private string $posicao;
    private $foto;
    private string $senha;
    private string $sexo;
    
    public function __construct(private string $email){
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

    public function setFoto($foto):void{
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

    public function getAltura():string{
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
        
        $diretorio = __DIR__."/../fotos/";
        $nome_foto = $this->foto;
        $info_name = explode(".",$nome_foto);
        $extensao = end($info_name);
        $this->foto = uniqid().".".$extensao;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $diretorio.$this->foto);
        $this->foto = "fotos/".$this->foto;

    
        if(isset($this->id)){
            $sql = "UPDATE atletas SET nome = '{$this->nome}' ,data_nasc = '{$this->data_nasc}',altura = '{$this->altura}',foto = '{$this->foto}',email = '{$this->email}' WHERE id = {$this->id}";
        }else{
            $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 
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
        $p = new Atleta($resultado[0]['email']);
        $p->setId($resultado[0]['id']);
        $p->setNome($resultado[0]['nome']);
        $p->setData_nasc($resultado[0]['data_nasc']);
        $p->setTurma($resultado[0]['turma']);
        $p->setAltura($resultado[0]['altura']);
        $p->setPosicao($resultado[0]['posicao']);
        $p->setFoto($resultado[0]['foto']);
        $p->setSenha($resultado[0]['senha']);
        $p->setSexo($resultado[0]['sexo']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atletas";
        $resultados = $conexao->consulta($sql);
        
        $atletas = array();
        foreach($resultados as $resultado){
            $p = new Atleta($resultado['email']);
            $p->setId($resultado['id']);
            $p->setNome($resultado['nome']);
            $p->setData_nasc($resultado['data_nasc']);
            $p->setTurma($resultado['turma']);
            $p->setAltura($resultado['altura']);
            $p->setPosicao($resultado['posicao']);
            $p->setFoto($resultado['foto']);
            $p->setSenha($resultado['senha']);
            $p->setSexo($resultado['sexo']);
            $atletas[] = $p;
        }
        return $atletas;
    }

    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atletas WHERE email = '{$this->email}'";
        $resultados = $conexao->consulta($sql);
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


    public static function qualtime(){
        $conexao = new MySQL();
        $sql = "SELECT DISTINCT nome_time FROM time, atletas WHERE id=time.id_goleiro or id=time.id_fixo or id=time.id_alaDireita or id=time.id_alaEsquerda or id=time.id_Pivo or id=time.id_reserva1 or id=time.id_reserva2 or id=time.id_reserva3 or id=time.id_reserva4 or id=time.id_reserva5";
        $resultados = $conexao->consulta($sql);
        return $resultados;
        foreach($resultados as $resultado){
            $nome = $resultado['nome_time'];
    }
    return $nome;
}
}