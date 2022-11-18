<?php

class Time implements ActiveRecord{

    private int $id;
    
    public function __construct(private string $nome_time,private int $id_goleiro, private int $id_fixo, private int $id_alaDireita, private int $id_alaEsquerda, private int $id_Pivo, private int $id_reserva1, private int $id_reserva2, private int $id_reserva3, private int $id_reserva4, private int $id_reserva5){
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function setNome_time(string $nome_time):void{
        $this->nome_time = $nome_time;
    }

    public function setId_goleiro(int $id_goleiro):void{
        $this->id_fixo = $id_goleiro;
    }

    public function setId_fixo(int $id_fixo):void{
        $this->id_fixo = $id_fixo;
    }

    public function setId_alaDireita(int $id_alaDireita):void{
        $this->id_alaDireita = $id_alaDireita;
    }

    public function setId_alaEsquerda(int $id_alaEsquerda):void{
        $this->id_alaEsquerda = $id_alaEsquerda;
    }

    public function setId_Pivo(int $id_Pivo):void{
        $this->id_Pivo = $id_Pivo;
    }

    public function setId_reserva1(int $id_reserva1):void{
        $this->id_reserva1 = $id_reserva1;
    }

    public function setId_reserva2(int $id_reserva2):void{
        $this->id_reserva2 = $id_reserva2;
    }

    public function setId_reserva3(int $id_reserva3):void{
        $this->id_reserva3 = $id_reserva3;
    }

    public function setId_reserva4(int $id_reserva4):void{
        $this->id_reserva4 = $id_reserva4;
    }

    public function setId_reserva5(int $id_reserva5):void{
        $this->id_reserva5 = $id_reserva5;
    }

    public function getNome_time():int{
        return $this->nome_time;
    }

    public function getId_goleiro():int{
        return $this->id_goleiro;
    }

    public function getId_fixo():int{
        return $this->id_fixo;
    }

    public function getId_alaDireita():int{
        return $this->id_alaDireita;
    }

    public function getId_alaEsquerda():int{
        return $this->id_alaEsquerda;
    }

    public function getId_Pivo():int{
        return $this->id_pivo;
    }

    public function getId_reserva1():int{
        return $this->id_reserva1;
    }

    public function getId_reserva2():int{
        return $this->id_reserva2;
    }

    public function getId_reserva3():int{
        return $this->id_reserva3;
    }

    public function getId_reserva4():int{
        return $this->id_reserva4;
    }

    public function getId_reserva5():int{
        return $this->id_reserva5;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE time SET nome_time = '{$this->nome_time}' ,id_goleiro = '{$this->id_goleiro}',id_fixo = '{$this->id_fixo}',id_alaDireita = '{$this->id_alaDireita}',id_alaEsquerda = '{$this->id_alaEsquerda}',id_Pivo = '{$this->id_Pivo}',id_reserva1 = '{$this->id_reserva1}',id_reserva2 = '{$this->id_reserva2}',id_reserva3 = '{$this->id_reserva3}',id_reserva4 = '{$this->id_reserva4}',id_reserva5 = '{$this->id_reserva5}' WHERE id = {$this->id}";
        }else{
            $sql = "INSERT INTO time (nome_time,id_goleiro,id_fixo,id_alaDireita,id_alaEsquerda,id_Pivo,id_reserva1,id_reserva2,id_reserva3,id_reserva4,id_reserva5) VALUES ('{$this->nome_time}','{$this->id_goleiro}','{$this->id_fixo}','{$this->id_alaDireita}','{$this->id_alaEsquerda}','{$this->id_Pivo}','{$this->id_reserva1}','{$this->id_reserva2}','{$this->id_reserva3}','{$this->id_reserva4}','{$this->id_reserva5}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM time WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Time{
        $conexao = new MySQL();
        $sql = "SELECT * FROM time WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $p = new Time($resultado[0]['nome_time'],$resultado[0]['id_goleiro'],$resultado[0]['id_fixo'],$resultado[0]['id_alaDireita'],$resultado[0]['id_alaEsquerda'],$resultado[0]['id_Pivo'],$resultado[0]['id_reserva1'],$resultado[0]['id_reserva2'],$resultado[0]['id_reserva3'],$resultado[0]['id_reserva4'],$resultado[0]['id_reserva5']);
        $p->setId($resultado[0]['id']);
        return $p;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM time";
        $resultados = $conexao->consulta($sql);
        $time = array();
        foreach($resultados as $resultado){
            $p = new Time($resultado[0]['nome_time'],$resultado[0]['id_goleiro'],$resultado[0]['id_fixo'],$resultado[0]['id_alaDireita'],$resultado[0]['id_alaEsquerda'],$resultado[0]['id_Pivo'],$resultado[0]['id_reserva1'],$resultado[0]['id_reserva2'],$resultado[0]['id_reserva3'],$resultado[0]['id_reserva4'],$resultado[0]['id_reserva5']);
            $p->setId($resultado['id']);
            $time[] = $p;
        }
        return $time;
    }

    
}
