<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location:loginAdmin.php");
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
    <title>Admin Page</title>
</head>
<body>
<img src="logo.png" alt="">
    <h1>Seja bem vindo Administrador</h1>
    <a href='sair.php'>Logout</a>

</body>
</html>