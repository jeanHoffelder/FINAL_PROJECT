<?php

class Checar{

    public function __construct(private string $conteudo){}


    public function setConteudo(string $conteudo):void{
        $this->conteudo = $conteudo;
    }
    public function getConteudo():string{
        return $this->conteudo;
    }

    public static function find(): Checar
    {
        $conexao = new MySQL();
        $sql = "SELECT atletas.id, atletas.nome FROM atletas WHERE atletas.id = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new Checar($resultado[0]['conteudo']);
        return $u;
    }

}



