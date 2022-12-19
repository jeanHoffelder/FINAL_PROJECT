<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall(); 

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
};

if (isset($_SESSION['blocked_user_id']) && $_SESSION['blocked_user_id'] == $user_id) {
  // Exiba uma mensagem informando que o usuário não tem permissão para realizar essa ação
  echo 'Você não tem permissão para realizar essa ação.';
};


if(isset($_POST['botao'])){
  require_once __DIR__."/vendor/autoload.php";
  $time = new Time($_POST['nome'],$_POST['goleiro'],$_POST['fixo'],$_POST['ala_dir'],$_POST['ala_esq'],$_POST['pivo'],$_POST['reserva1'],$_POST['reserva2'],$_POST['reserva3'],$_POST['reserva4'],$_POST['reserva5']);
  $time->save();
  header("location: restritaAdmin.php");
}




?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="formCad.css" />
    <title>Create a Team</title>
</head>
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
      echo "<p>Favorite Position: $posicao </p>";
      echo "<p>age: $idade y.o</p>";
      echo "<p>group: $turma </p>";
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


<br>
<br>
<h1>DRAG PLAYERS' CARDS</h1>
    <div class='container2'>
      <form action="telaTime.php" method='POST'>

        Name Team: <input name='nome' placeholder='Ex: gremio' required>
        <br>
        Goalkeeper: <input name='goleiro' placeholder='drop desired player here' required>
        <br>
        Fixed: <input name='fixo' placeholder='drop desired player here' required>
        <br>
        Right-Wing: <input name='ala_dir' placeholder='drop desired player here' required>
        <br>
        Left-Wing: <input name='ala_esq' placeholder='drop desired player here' required>
        <br>
        Target: <input name='pivo' placeholder='drop desired player here' required>
        <br>
        First Reserve: <input name='reserva1' placeholder='drop desired player here' required>
        <br>
        Second Reserve: <input name='reserva2' placeholder='drop desired player here' required>
        <br>
        third Reserve: <input name='reserva3' placeholder='drop desired player here' required>
        <br>
        fourth Reserve: <input name='reserva4' placeholder='drop desired player here' required>
        <br>
        fifth Reserve: <input name='reserva5' placeholder='drop desired player here' required>
        <br>

        <input type='submit' name='botao' value='create team'>
      </form>
    </div>
        <a href="restritaAdmin.php"><button class='botao'>Cancel</button></a>
</body>
</html>
