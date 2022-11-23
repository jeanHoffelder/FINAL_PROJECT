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
        Data de Nascimento: <input name='data_nasc' type='date' required>
        <br>
        Turma: <input name='turma' type='text' required>
        <br>
        Altura: <input name='altura' type='text' required>
        <br>
        Posição: <input name='posicao' type='text' required>
        <br>
        Foto: <input name='foto' type='text' required>
        <br>
        E-mail: <input name='email' type='email' required>
        <br>
        Senha: <input name='senha' type='text' required>
        <br>
        Sexo: <input name='sexo' type='text' required>
        <br>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

