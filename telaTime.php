<?php
require_once __DIR__."/vendor/autoload.php";
$atletas = Atleta::findall(); 

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}

<<<<<<< HEAD
if (isset($_SESSION['blocked_user_id']) && $_SESSION['blocked_user_id'] == $user_id) {
  // Exiba uma mensagem informando que o usuário não tem permissão para realizar essa ação
  echo 'Você não tem permissão para realizar essa ação.';
}
=======

// //php de criação para o time
// //jogador1 = $this.idAtleta algo assim


// public function __construct(private string $nome_time,private int $id_goleiro,
//  private int $id_fixo, private int $id_alaDireita, private int $id_alaEsquerda, private int $id_Pivo, 
//  private int $id_reserva1, private int $id_reserva2, private int $id_reserva3, private int $id_reserva4, 
//  private int $id_reserva5){
// }


if(isset($_POST['botao'])){
  require_once __DIR__."/vendor/autoload.php";
  $time = new Time($_POST['nome'],$_POST['goleiro'],$_POST['fixo'],$_POST['ala_dir'],$_POST['ala_esq'],$_POST['pivo'],$_POST['reserva1'],$_POST['reserva2'],$_POST['reserva3'],$_POST['reserva4'],$_POST['reserva5']);
  $time->save();
  header("location: index.php");
}




>>>>>>> 50cde5034160fcc31db290fc4ee26dffcd150af2
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

<br>

    <div class='container2'>
      <form action="telaTime.php" method='POST'>
        <br>
        <label for="nome">nome team</label> <input name='nome' type='text' placeholder='Ex: gremio' required>
        <br>
        Goleiro: <input name='goleiro' required>
        <br>
        Fixo: <input name='fixo' required>
        <br>
        Ala Direita: <input name='ala_dir' required>
        <br>
        Ala Esquerda: <input name='ala_esq' required>
        <br>
        Pivo: <input name='pivo' required>
        <br>
        Primeiro Reserva: <input name='reserva1' required>
        <br>
        Segundo Reserva: <input name='reserva2' required>
        <br>
        Terceiro Reserva: <input name='reserva3' required>
        <br>
        Quarto Reserva: <input name='reserva4' required>
        <br>
        Quinto Reserva: <input name='reserva5' required>


        <input type='submit' name='botao' value='create team'>
      </form>
    </div>

</body>
</html>
