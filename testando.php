<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall(); 
?>
<html>
<head>
  <style>
    .card {
      width: 300px;
      height: 350px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      margin: 10px;
      float: left;
      border-radius: 10px;
      overflow: hidden;
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
// Recebe as informações do atleta
foreach($atletas as $atleta){
    $nome = $atleta->getNome();
    $posicao = $atleta->getPosicao();
    $idade = calcularIdade($atleta->getData_nasc());
    $turma = $atleta->getTurma();

    echo '<div class="card">';
    echo '  <img src="atleta.jpg" alt="Foto do atleta">';
    echo '  <h1>' . $nome . '</h1>';
    echo '  <p>Posição: ' . $posicao . '</p>';
    echo '  <p>Idade: ' . $idade . ' anos</p>';
    echo '  <p>Turma: ' . $turma . '</p>';
    echo '</div>';
}

?>

</script>
</script>
</body>
</html>