<?php

class Jogador{

    public function __construct(private int $idJogador, private string $nomeJogador){}


    public function setIdJogador(int $idJogador):void{
        $this->idJogador = $idJogador;
    }

    public function getIdJogador():int{
        return $this->idJogador;
    }

    public function setNomeJogador(string $nomeJogador):void{
        $this->nomeJogador = $nomeJogador;
    }
    public function getNomeJogador():string{
        return $this->nomeJogador;
    }


    public static function find($id): Jogador
    {
        $conexao = new MySQL();
        $sql = "SELECT atletas.id, atletas.nome FROM atletas WHERE atletas.id = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new Jogador($resultado[0]['id'],$resultado[0]['nome']);
        return $u;
    }

}
?>
