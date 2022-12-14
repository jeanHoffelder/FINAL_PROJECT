<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}else{}


require_once __DIR__."/vendor/autoload.php";

$atletas = Atleta::findall();
$time = Time::findall();
?>



echo(save)



}