<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$atleta = Atleta::find($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRestrita.css" />
    <!-- <link rel="stylesheet" href="styleRestrita.css" /> -->
    <title>Team Page</title>
</head>
<body>
    <header>
        <?php echo "<h2>Welcome,  {$_SESSION['nome']} </h2>"?>
    <?php
    echo "<a href=formEdit.php?id={$_SESSION['id']}>   <button  class='botao'>edit profile</button> </a>";
    ?>
    <a href='sair.php'> <button class='botao'>logout</button></a>
    </header>
    <br>
    

    <head>
  <style>
    .card{
        width: 300px;
        height: 350px;
        border: 1px solid #ccc;
        margin: 0 auto;
        border-radius: 10px;
        float: center;
        overflow: hidden;
    }
    .elementos_card {
      background-color: #f1f1f1;
      height: 100%;
      width: 100%;
      position: relative;
      z-index: -1;
    }
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .card h1 {
      font-size: 18px;
      margin: 10px;
      text-align: center;
    }
    .card p {
      font-size: 14px;
      margin: 10px;
      text-align: center;
    }
</style>
</head>
<body>

<?php
function calcularIdade($data){
    $idade = 0;
    $data_nascimento = date('Y-m-d', strtotime($data));
    list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);
    
       $idade      = date("Y") - $anoNasc;
       if (date("m") < $mesNasc){
           $idade -= 1;
       } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
           $idade -= 1;
       }
    
       return $idade;
   } 

echo "<div id='container'>";


  $foto = $atleta->getFoto();
  $nome = $atleta->getNome();
  $posicao = $atleta->getPosicao();
  $idade = calcularIdade($atleta->getData_nasc());
  $turma = $atleta->getTurma();
  $id = $atleta->getId();

  echo "<div class='card' draggable='true' id=$id>";
    echo "<div class='elementos_card'>";
      echo " <img width=150px src={$foto}>";
      echo "<h1> $nome </h1>";
      echo "<p>Posição: $posicao </p>";
      echo "<p>Idade: $idade anos</p>";
      echo "<p>Turma: $turma </p>";
    echo "</div>";
  echo "</div>";

echo "</div>";
?>

    <?php
    // echo Atleta::qualtime();

    ?>
</body>
</html>