<?php

class Checar{

    public function __construct(private string $conteudo){}


    public function setConteudo(string $conteudo):void{
        $this->conteudo = $conteudo;
    }
    public function getConteudo():string{
        return $this->conteudo;
    }

    public static function find(): string
    {
        $conexao = new MySQL();
        $sql = "SELECT
        CASE
          WHEN not EXISTS (SELECT * FROM time) THEN 'nao'
          ELSE 'sim'
        END as a
      FROM dual;";
        $resultado = $conexao->consulta($sql);
        return $resultado[0]['a'];
    }
}



