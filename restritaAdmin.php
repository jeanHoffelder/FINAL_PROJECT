<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$atletas = Atleta::findall();
$time = Time::findall();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styleRestrita.css" />
    <title>Team Page</title>
</head>
<body>
    <header>
        <?php echo "<h2>Welcome, {$_SESSION['nome']} </h2>"?>
    </header>
    <img src="logo.png" alt="">
    <h1>You haven't been cast yet :'(</h1>
    <a href='sair.php'>Logout</a>
    <?php
    echo "<a href=formEdit.php?id={$_SESSION['id']}>Editar Perfil</a>";
    ?>
    <img src="logo.png" alt="">
</body>
</html>
?>