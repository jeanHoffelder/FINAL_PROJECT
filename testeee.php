<div id="container">
  <div class="card" draggable="true" id="card-1">Card 1</div>
  <div class="card" draggable="true" id="card-2">Card 2</div>
  <div class="card" draggable="true" id="card-3">Card 3</div>
</div>

<style>
  /* Estilos para os cards */
  .card {
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    margin-bottom: 10px;
  }
</style>

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