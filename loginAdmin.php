<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $admin = new Administrador($_POST['email']);
    $admin->setSenha($_POST['senha']);
    if($admin->authenticate()){
        header("location: restritaAdmin.php");
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
    <link rel="stylesheet" href="style.css" />
    <title>Admin</title>
</head>
<body>
    <a href='index.php'>Go Back</a> 
    <form action='LoginAdmin.php' method='POST'>
        E-mail:<br> <input name='email' type='email' placeholder='thaciano@gmail.com' required>
        <br>
        Password:<br> <input name='senha' type='password' placeholder='*****' required>
        <br>
        <input type='submit' name='botao' value='Sign In'>
    </form>
</body>
</html>