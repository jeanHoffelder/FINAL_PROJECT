<html>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="styletelaTime.css" />
<body>
<h1>DRAG PLAYERS' CARDS</h1>
<div class="campo">
  <img src="Campofutsal.png" alt="">
</div>
<form action="telaTime.php" method='POST'>
  Name your Team: <input name='nome' placeholder='Ex: gremio' required>
  <br>
    <br>
    <div class="reservas">
      <input name='reserva1' placeholder='drop desired player here' required>
      <br>
      <input name='reserva2' placeholder='drop desired player here' required>
      <br>
      <input name='reserva3' placeholder='drop desired player here' required>
      <br>
      <input name='reserva4' placeholder='drop desired player here' required>
      <br>
      <input name='reserva5' placeholder='drop desired player here' required>
      <br>
    </div>
    <input type='submit' name='botao' value='create team'>
    <a href="restritaAdmin.php"><button class='botao'>Cancel</button></a>
    <div class="posicoes">
    <div class="goalkeeper">
      <input name='goleiro' placeholder='drop desired player here' required>
    </div>  
    <br>
    <div class="fixed">
      <input name='fixo' placeholder='drop desired player here' required>
    </div>
    <br>
    <div class="rightwing">
      <input name='ala_dir' placeholder='drop desired player here' required>
    </div>
    <br>
    <div class="leftwing">
      <input name='ala_esq' placeholder='drop desired player here' required>
    </div>
    <br>
    <div class="target">
      <input name='pivo' placeholder='drop desired player here' required>
    </div>
  </form>
</body>
</html>