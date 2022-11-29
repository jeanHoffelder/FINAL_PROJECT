<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$atletas = Atleta::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Time</title>
</head>
<body>
    <h1>Bem vindo ao time!</h1>
</body>
</html>