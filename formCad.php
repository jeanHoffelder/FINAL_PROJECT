<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta = new Atleta($_POST['email']);
    $atleta->setNome($_POST['nome']);
    $atleta->setData_nasc($_POST['data_nasc']);
    $atleta->setTurma($_POST['turma']);
    $atleta->setAltura($_POST['altura']);
    $atleta->setPosicao($_POST['posicao']);
    $atleta->setFoto($_FILES['foto']['name']);
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
    <link rel="stylesheet" href="formCad.css" />
    <title>Sign Up</title>
</head>
<body>
    <a href='index.php'> <button class='botao'>Back</button></a>
    <h1>FILL IN THE FOLLOWING INFO</h1>
    <form action='formCad.php' method='POST' enctype="multipart/form-data">
        Name:<br> <input name='nome' type='text' placeholder='Ex.: Lionel Messi' required>
        <br>
        E-mail:<br> <input name='email' type='email' placeholder='Lionelzinho123@gmail.com' required>
        <br>
        Password:<br> <input name='senha' type='password' placeholder='*****' required>
        <br>
        Birth date:<br> <input name='data_nasc' type='date' required>
        <br>
        Group:<br>
        <select name='turma'> 
            <option value='1° year - Computer Technician'>1° year - Computer Technician</option>
            <option value='2° year - Computer Technician'>2° year - Computer Technician</option>
            <option value='3° year - Computer Technician'>3° year - Computer Technician</option>
            <option value='4° year - Computer Technician'>4° year - Computer Technician</option>
            <option value='1° year - Técnico em Química'>1° year - Chemistry Technician</option>
            <option value='2° year - Chemistry Technician'>2° year - Chemistry Technician</option>
            <option value='3° year - Chemistry Technician'>3° year - Chemistry Technician</option>
            <option value='4° year - Chemistry Technician'>4° year - Chemistry Technician</option>
            <option value='1° year - Environmental technician'>1° year - Environmental technician</option>
            <option value='2° year - Environmental technician'>2° year - Environmental technician</option>
            <option value='3° year - Environmental technician'>3° year - Environmental technician</option>
            <option value='4° year - Environmental technician'>4° year - Environmental technician</option>
        </select>
        <br>
        Height:<br> <input name='altura' type='number' maxLength='3' min='100' max='310' placeholder='Ex.: 180' required>
        <br>
        Favorite Position:<br> <select name='posicao'>
            <option value='Goalkeeper'>Goalkeeper</option>
            <option value='Fixed'>Fixed</option>
            <option value='Right-Wing'>Right-Wing</option>
            <option value='Left-Wing'>Left-Wing</option>
            <option value='Target'>Target</option>
        </select>
        <br>
        Gender:<br> <select name='sexo'>
            <option value='m'>M</option>
            <option value='f'>F</option>
        </select>
        <br>
        Photo:<br><input type='file' name='foto' id='foto' required>
        
        <br>
        <br>
        <input type='submit' name='botao' value='Sign Up'>
    </form>
</body>
</html>

