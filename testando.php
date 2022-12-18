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

    echo "<div id='container'>";
    echo    "<div class='card' draggable='true' id='card-1'><img src='atleta.jpg' alt='Foto do atleta'>
            <h1> $nome </h1>
            <p>Posição: $posicao </p>
            <p>Idade: $idade anos</p>
            <p>Turma: $turma </p>
            </div>
            </div>";
            ?>
            <script>
            // Obtém o container onde os cards serão arrastados
            var container = document.getElementById('container');

            // Adiciona os ouvintes de eventos de arrastar e soltar ao container
            container.addEventListener('dragstart', dragStart);
            container.addEventListener('dragover', dragOver);
            container.addEventListener('drop', dragDrop);

            // Função chamada quando o usuário começa a arrastar um card
            function dragStart(e) {
                e.dataTransfer.setData('text/plain', e.target.id);
            }

            // Função chamada quando o usuário arrasta um card sobre outro
            function dragOver(e) {
                e.preventDefault();
            }

            // Função chamada quando o usuário solta um card em outro
            function dragDrop(e) {
                var id = e.dataTransfer.getData('text');
                var card = document.getElementById(id);
                e.target.parentNode.insertBefore(card, e.target);
            }
            </script>
            <?php
} 
?>

</script>
</script>
</body>
</html>