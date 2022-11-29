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
    <link rel="stylesheet" href="formCad.css" />
    <title>Adiciona Atleta</title>
</head>
<body>
    <form action='formCad.php' method='POST'>
        Nome:<br> <input name='nome' type='text' placeholder='Ex.: Thaciano' required>
        <br>
        E-mail:<br> <input name='email' type='email' placeholder='thaciano@gmail.com' required>
        <br>
        Senha:<br> <input name='senha' type='password' placeholder='*****' required>
        <br>
        Data de Nascimento:<br> <input name='data_nasc' type='date' required>
        <br>
        Turma:<br>
        <select name='turma'> 
            <option value='0'>Select</option>
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
        Altura:<br> <input name='altura' type='text' maxLength='3' placeholder='Ex.: 180' required>
        <br>
        Posição:<br> <select name='posicao'>
            <option value='0'>Select</option>
            <option value='goleiro'>Goleiro</option>
            <option value='fixo'>Fixo</option>
            <option value='alaDireita'>Ala-Direita</option>
            <option value='alaEsquerda'>Ala-Esquerda</option>
            <option value='pivo'>Pivô</option>
        </select>
        <br>
        Sexo:<br> <select name='sexo'>
            <option value='0'>Select</option>
            <option value='m'>M</option>
            <option value='f'>F</option>
        </select>
        <br>
        Foto:<br> <input name='foto' type='file' required>
        <br>
        <input type='submit' name='botao'>
    </form>

    <img src="bemvindo.jpg" alt="">
    <h1>BEM VINDO!</h1>
</body>
</html>

