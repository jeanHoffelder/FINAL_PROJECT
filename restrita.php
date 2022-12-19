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
    <link rel="stylesheet" href="styleRestrita.css" />
    <!-- <link rel="stylesheet" href="styleRestrita.css" /> -->
    <title>Team Page</title>
</head>
<body>
    <header>
        <?php echo "<h2>Welcome,  {$_SESSION['nome']} </h2>"?>
    <?php
    echo "<a href=formEdit.php?id={$_SESSION['id']}>   <button  class='botao'>edit profile</button> </a>";
    ?>
    <a href='sair.php'> <button class='botao'>logout</button></a>
    </header>
    <br>
    <h1>You haven't been cast yet!</h1>
    <?php
    // echo Atleta::qualtime();

    ?>
</body>
</html>