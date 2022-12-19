<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location: loginAdmin.php");
}
require_once __DIR__."/vendor/autoload.php";

$atletas = Atleta::findall();
$times = Time::findall();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRestritaadm.css" />
    <title>Admin Page</title>
</head>
<body>
<header>
        <?php echo "<h2>Welcome, Administrator</h2>"?>
    <a href='sair.php'> <button class='botao'>logout</button></a>
    </header>
    <br>
    <a href="telaTime.php"><button class='botao'>Create a new Team</button></a>
    <br>



<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>Team Name</td>
    </tr>
    <?php
    foreach($times as $time){
        echo "<tr>";
        echo "<td>{$time->getNome_time()}</td>";
        // echo "<td>
        //         <a href='excluir.php?id={$time->getId()}'>Delete</a> 
        //      </td>";
        echo "</tr>";
    }
    ?>
</table>



</body>
</html>
