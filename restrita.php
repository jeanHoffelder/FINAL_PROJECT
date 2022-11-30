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
    <title>Team Page</title>
</head>
<body>
    <img src="logo.png" alt="">
    <h1>You haven't been cast yet :'(</h1>
    <img src="logo.png" alt="">
</body>
</html>