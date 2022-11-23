<?php 
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta= new Atleta($_POST['email']);
    $atleta->setSenha($_POST['senha']);
    if($u->authenticate()){
        header("location: restrita.php");
    }else{
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRASFOOT IF</title>
</head>
<body>
    <img src="logo.png" alt="">
    <img src="fotoQuadra.png" alt="">

    <form action="index.php" method='post'>
        <label for='email'>E-mail:</label>
        <input type='email' name='email' id='email' required>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password' required>
        <input type='submit' name='botao' value='Sign in'>
    </form>

    <form action="formCad.php" method='post'>
        <input type='submit' name='botao' value='Sign up'>
    </form>

</body>
</html>