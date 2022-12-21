<?php
require_once __DIR__."/vendor/autoload.php";

$atletas = Atleta::findall2();

session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
};

if (isset($_SESSION['blocked_user_id']) && $_SESSION['blocked_user_id'] == $user_id) {
  // Exiba uma mensagem informando que o usuário não tem permissão para realizar essa ação
  echo 'Você não tem permissão para realizar essa ação.';
};


$eRepetido = false;
if(isset($_POST['botao'])){
  require_once __DIR__."/vendor/autoload.php";
  // var_dump($_POST);
  $jogadores2 = $_POST;
  $arr = array_count_values($jogadores2);

  foreach($arr as $key => $value){
    if($value > 1){
      $eRepetido = true;
    }
  }
  if (!$eRepetido) {
    $time = new Time($_POST['nome'],$_POST['goleiro'],$_POST['fixo'],$_POST['ala_dir'],$_POST['ala_esq'],$_POST['pivo'],$_POST['reserva1'],$_POST['reserva2'],$_POST['reserva3'],$_POST['reserva4'],$_POST['reserva5']);
    $time->save();
    
    header("location: restritaAdmin.php");

  } else {
    echo  "<script>window.confirm('Time não criado! Há jogadores repetidos');</script>";
    
  }

}




?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styletelaTime.css" />
    <title>Create a Team</title>
</head>
<head>
  <style>
    .card{
        width: 250px;
        height: 300px;
        border: 1px solid #ccc;
        margin: 10px;
        border-radius: 10px;
        float: left;
        overflow: hidden;
        color: rgb(0, 0, 0);
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
      height: 175px;
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

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<div id="said1" class="modal">
  <?php
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
</div>
    
<p><a href="#said1" rel="modal:open"><span class="butao_cards">Cards</span></a></p>

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

<div class='containerfh1'>
<h1>SELECT PLAYER'S</h1>
    <div class='container2'>
      <form action="telaTime.php" method='POST'>
        
  <div class='select'>
  Name Team: <input type="text" name='nome' placeholder='Ex: Brasil' required>
<label for="select2">Goalkeeper:</label>
<select name="goleiro" id="select1" required onchange="desabilitarOpcao('select1')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>

<div class='select'>
<label for="select2">Fixed:</label>
<select name="fixo" id="select2" required onchange="desabilitarOpcao('select2')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>

<div class='select'>
<label for="select3">Right-Wing:</label>
<select name="ala_dir" id="select3" required onchange="desabilitarOpcao('select3')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>

<div class='select'>
<label for="select4">Left-Wing:</label>
<select name="ala_esq" id="select4" required onchange="desabilitarOpcao('select4')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>

<div class='select'>
<label for="select5">Target:</label>
<select name="pivo" id="select5" required onchange="desabilitarOpcao('select5')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>

<div class='select'>
<label for="select6">First Reserve:</label>
<select name="reserva1" id="select6" required onchange="desabilitarOpcao('select6')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>

<div class='select'>
<label for="select7">Second Reserve:</label>
<select name="reserva2" id="select7" required onchange="desabilitarOpcao('select7')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        }

?>
</select>
</div>



<div class='select'>
  <label for="select8">Third Reserve:</label>
  <select name="reserva3" id="select8" required onchange="desabilitarOpcao('select8')">
  <option value="" selected disabled select></option>
  <?php
          $conexao = new MySQL();
          $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
          WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
          AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
          AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
          AND atletas.id!=time.id_reserva5 
          GROUP by id 
          order by nome asc";
          $jogadores = $conexao->executa($sql);
  
          foreach($jogadores as $jogador){
              echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
          }
  
  ?>
  </select>
</div>

<div class="select">
  <label for="select9">Fourth Reserve:</label>
  <select name="reserva4" id="select9" required onchange="desabilitarOpcao('select9')">
  <option value="" selected disabled select></option>
  <?php
          $conexao = new MySQL();
          $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
          WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
          AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
          AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
          AND atletas.id!=time.id_reserva5 
          GROUP by id 
          order by nome asc";
          $jogadores = $conexao->executa($sql);
  
          foreach($jogadores as $jogador){
              echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
          }
  
  ?>
  </select>
</div>

<div class="select">
<label for="select10">Fifth Reserve:</label>
<select name="reserva5" id="select10" required onchange="desabilitarOpcao('select10')">
<option value="" selected disabled select></option>
<?php
        $conexao = new MySQL();
        $sql = "SELECT id, nome, turma, posicao FROM `atletas`, time 
        WHERE atletas.id!=time.id_goleiro AND atletas.id!=time.id_fixo AND atletas.id!=time.id_alaDireita 
        AND atletas.id!=time.id_alaEsquerda AND atletas.id!=time.id_Pivo AND atletas.id!=time.id_reserva1 
        AND atletas.id!=time.id_reserva2 AND atletas.id!=time.id_reserva3 AND atletas.id!=time.id_reserva4 
        AND atletas.id!=time.id_reserva5 
        GROUP by id 
        order by nome asc";
        $jogadores = $conexao->executa($sql);

        foreach($jogadores as $jogador){
            echo "<option  value={$jogador['id']}>{$jogador['nome']}, from {$jogador['turma']}, who prefers to play as {$jogador['posicao']}</option>";
        } 

?>
</select>
</div>


<script>
//   var opcoesDesabilitadas = [];

// function desabilitarOpcao(idSelect) {
//   // Obtemos o valor selecionado no select que foi alterado
//   var valorSelecionado = document.getElementById(idSelect).value;

//   // Adicionamos o valor à lista de opções desabilitadas
//   opcoesDesabilitadas.push(valorSelecionado);

//   // Obtemos as opções dos demais selects
//   var selects = document.querySelectorAll("select:not(#" + idSelect + ")");

//   // Desabilitamos a opção com o mesmo valor do select alterado em todos os demais selects
//   for (var i = 0; i < selects.length; i++) {
//       var opcoes = selects[i].options;
//       var valorAtual = selects[i].value;
//       for (var j = 0; j < opcoes.length; j++) {
//         if (opcoesDesabilitadas.includes(opcoes[j].value)) {
//       }
//     }
//   }
// }

</script>





        <input type='submit' name='botao' value='create team'>
      </form>
    </div>
    <a href="restritaAdmin.php"><button class='botao'>Cancel</button></a>
</div>
</body>
</html>
 
