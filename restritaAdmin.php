<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location: loginAdmin.php");
}
require_once __DIR__."/vendor/autoload.php";

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
    <a href='sair.php'> <button class='botao'>log out</button></a>
    </header>
    <br>
    <a href="telaTime.php"><button class='botao'>Create a new Team</button></a>
    <br>
    <br>


<table>
    <tr>
        <td>Team Name</td>

        <td>Name Goalkeeper</td>

        <td>Name Fixed</td>

        <td>Name Right-Wing</td>

        <td>Name Left-Wing</td>

        <td>Name Target</td>

        <td>Name First Reserve</td>

        <td>Name Second Reserve</td>

        <td>Name Third Reserve</td>

        <td>Name Fourth Reserve</td>

        <td>Name Fifth Reserve</td>
    </tr>

    <?php
    foreach($times as $time){
        echo "<tr>";
        echo "<td>{$time->getNome_time()}</td>";
        echo "<td>"; echo Jogador::find($time->getId_goleiro())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_fixo())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_alaDireita())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_alaEsquerda())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_Pivo())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_reserva1())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_reserva2())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_reserva3())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_reserva4())->getNomeJogador(); echo"</td>";
        echo "<td>"; echo Jogador::find($time->getId_reserva5())->getNomeJogador(); echo"</td>";

        // echo "<td>
        //         <a href='excluir.php?id={$time->getId()}'>Delete</a> 
        //      </td>";
        echo "</tr>";
    }
    ?>
</table>



</body>
</html>
