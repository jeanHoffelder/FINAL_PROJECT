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
    foreach($atletas as $atleta){
        echo "<tr>";
        echo "<td>{$atleta->getNome()}</td>";
        echo "<td>{$atleta->getPosicao()}</td>";
        echo "<td>".calcularIdade($atleta->getData_nasc())."</td>";
        echo "<td>{$atleta->getTurma()}</td>";
        echo "</tr>";s
    }

    ?>
    
    Goleiro: <select name='posicao'>
        <?php
            foreach($atletas as $atleta){
                ?>
                <option value=""> <?php
                echo "<tr>";
                echo "<td>{$atleta->getNome()}</td>"; ?>
                </option> <?php
        }?>
    </select>
    
</table>
</body>
</html>






