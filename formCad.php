<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta = new Atleta($_POST['email']);
    $atleta->setNome($_POST['nome']);
    $atleta->setData_nasc($_POST['data_nasc']);
    $atleta->setTurma($_POST['turma']);
    $atleta->setAltura($_POST['altura']);
    $atleta->setPosicao($_POST['posicao']);
    $atleta->setFoto($_POST['foto']);
    $atleta->setSenha($_POST['senha']);
    $atleta->setSexo($_POST['sexo']);
    $atleta->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Sign Up</title>
</head>
<body>
    <a href='index.php'>Go Back</a>
    <form action='formCad.php' method='POST'>
        Name:<br> <input name='nome' type='text' placeholder='Ex.: Thaciano' required>
        <br>
        E-mail:<br> <input name='email' type='email' placeholder='thaciano@gmail.com' required>
        <br>
        Password:<br> <input name='senha' type='password' placeholder='*****' required>
        <br>
        Birth date:<br> <input name='data_nasc' type='date' required>
        <br>
        Class:<br>
        <select name='turma'> 
            <option value='ti1'>1° ano - Técnico em Informática</option>
            <option value='ti2'>2° ano - Técnico em Informática</option>
            <option value='ti3'>3° ano - Técnico em Informática</option>
            <option value='ti4'>4° ano - Técnico em Informática</option>
            <option value='tq1'>1° ano - Técnico em Química</option>
            <option value='tq2'>2° ano - Técnico em Química</option>
            <option value='tq3'>3° ano - Técnico em Química</option>
            <option value='tq4'>4° ano - Técnico em Química</option>
            <option value='tma1'>1° ano - Técnico em Meio Ambiente</option>
            <option value='tma2'>2° ano - Técnico em Meio Ambiente</option>
            <option value='tma3'>3° ano - Técnico em Meio Ambiente</option>
            <option value='tma4'>4° ano - Técnico em Meio Ambiente</option>
        </select>
        <br>
        Height:<br> <input name='altura' type='number' maxLength='3' placeholder='Ex.: 180' required>
        <br>
        Position:<br> <select name='posicao'>
            <option value='goleiro'>Goalkeeper</option>
            <option value='fixo'>Fixed</option>
            <option value='alaDireita'>Right-Wing</option>
            <option value='alaEsquerda'>Left-Wing</option>
            <option value='pivo'>Target</option>
        </select>
        <br>
        Sex:<br> <select name='sexo'>
            <option value='m'>M</option>
            <option value='f'>F</option>
        </select>
        <br>
        Photo:<br> <input name='foto' type='file' required>
        <br>
        <br>
        <input type='submit' name='botao' value='Sign Up'>
    </form>
</body>
</html>

