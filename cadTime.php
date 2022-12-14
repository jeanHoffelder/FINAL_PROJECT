<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Página de Atletas</title>
</head>
<body>
<table>
    <tr>
        <td>Nome</td>
        <td>Posição</td>
        <td>Idade</td>
        <td>Turma</td>
    </tr>
    <?php
    foreach($atletas as $atleta){
        echo "<tr>";
        echo "<td>{$atleta->getNome()}</td>";
        echo "<td>{$atleta->getPosicao()}</td>";
        echo "<td>{$atleta->getData_nasc()}</td>";
        echo "<td>{$atleta->getTurma()}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>






