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
    <title>Adiciona Atleta</title>
</head>
<body>
    <form action='formCad.php' method='POST'>
        Nome: <input name='nome' type='text' required>
        <br>
        E-mail: <input name='email' type='email' required>
        <br>
        Senha: <input name='senha' type='password' required>
        <br>
        Data de Nascimento: <input name='data_nasc' type='date' required>
        <br>
        Turma:
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
        Altura: <input name='altura' type='text' maxLength='3' required>
        <br>
        Posição: <select name='posicao'>
            <option value='0'>Select</option>
            <option value='goleiro'>Goleiro</option>
            <option value='fixo'>Fixo</option>
            <option value='alaDireita'>Ala-Direita</option>
            <option value='alaEsquerda'>Ala-Esquerda</option>
            <option value='pivo'>Pivô</option>
        </select>
        <br>
        Sexo: <select name='sexo'>
            <option value='m'>M</option>
            <option value='f'>F</option>
        </select>
        <br>
        Foto: <input name='foto' type='file' required>
        <br>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

