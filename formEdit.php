<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta = Atleta::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta = new Atleta($_POST['email']);
    $atleta->setId($_POST['id']);
    $atleta->setNome($_POST['nome']);
    $atleta->setData_nasc($_POST['data_nasc']);
    $atleta->setAltura($_POST['altura']);
    $atleta->setFoto($_POST['foto']);
    $atleta->save();
    header("location: restrita.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Atleta</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <br>
        <?php
            echo "E-mail: <input name='email' value={$atleta->getEmail()} type='email' required>";
            echo "<input name='id' value={$atleta->getId()} type='hidden'>";
        ?>
        <br>
        <?php
            echo "Name: <input name='nome' value='{$atleta->getNome()}' type='text' required>";
        ?>
        <br>
        <?php
            echo "Birth date: <input name='data_nasc' value='{$atleta->getData_nasc()}' type='date' required>";
        ?>
        <br>
        <?php
            echo "Height: <input name='altura' value='{$atleta->getAltura()}' type='number' maxLenght='3' min='100' max='310' required>";
        ?>
        <br>
        <?php
            echo "Photo: <input name='foto' value='{$atleta->getFoto()}' type='text' required>";
        ?>
        <br>
        
        <input type='submit' name='botao'>
    </form>
    <a href='restrita.php'>Voltar</a> | 
    <a href='sair.php'>Sair</a>
</body>
</html>

