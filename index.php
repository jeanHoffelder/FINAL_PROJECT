<<<<<<< HEAD
<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atleta = new Atleta($_POST['email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>BRASFOOT IF</title>
</head>
<body>
<<<<<<< HEAD
    <div class="Logo">
        <img src="logo.png" alt="">
    </div>

    <div class="Quadra">
        <img src="fotoQuadra.png" alt="">
    </div>

    <div class="Formulario1">
        <form action="index.php" method='post'>
            <label for='email'>E-mail:</label>
            <input type='email' name='email' id='email' required>
            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' required>
            <input type='submit' name='botao' value='Sign in'>
        </form>

        <a href="formCad.php">Sign Up</a>
    </div>

</body>
</html>