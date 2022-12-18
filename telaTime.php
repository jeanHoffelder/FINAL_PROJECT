<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall(); 

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}


?>
<html>
<head>
  <style>
    .card{
        width: 300px;
        height: 350px;
        border: 1px solid #ccc;
        margin: 10px;
        border-radius: 10px;
        float: left;
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

foreach($atletas as $atleta){
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
} 
echo "</div>";
?>
<script>

  var container = document.getElementById('container');

  container.addEventListener('dragstart', dragStart);
  container.addEventListener('dragover', dragOver);
  container.addEventListener('drop', dragDrop);

  function dragStart(e) {
    e.dataTransfer.setData('text/plain', e.target.id);
  }

  function dragOver(e) {
    e.preventDefault();
  }

  function dragDrop(e) {
    var id = e.dataTransfer.getData('text');
    var card = document.getElementById(id);
    let posicaoCardArrastado = Array.from(container.children).indexOf(card)
    let posicaoCardColocado = Array.from(container.children).indexOf(e.target)
    if(posicaoCardArrastado > posicaoCardColocado){
        container.insertBefore(card, e.target);
    }else{
        e.target.parentNode.insertBefore(card, e.target.nextSibling);
    }
  }
</script>

</body>
</html>