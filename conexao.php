<?php
$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysql = new mysql($host, $usuario, $senha, $database);

if($mysql->error){
    die("Falha ao conectar: " .$mysql->error);
}