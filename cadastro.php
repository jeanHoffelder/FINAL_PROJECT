<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Atletas</title>
</head>
<body>

<a href='formCad.php'>Cadastrar Atleta</a>
<br>
<a href='login.php'>Fazer Login</a>
</body>
</html>






