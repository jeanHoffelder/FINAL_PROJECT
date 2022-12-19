<html>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="styletelaTime.css" />
<body>
<div class='containerfh1'>
  <img src="Campofutsal.png" alt="">
  <h1>DRAG PLAYERS' CARDS</h1>
    <div class='container2'>
      <form action="telaTime.php" method='POST'>

        Name Team: <input name='nome' placeholder='Ex: gremio' required>
        <br>
        <div class="goalkeeper">
          <input name='goleiro' placeholder='drop desired player here' required>
        </div>  
        <br>
        <div class="fixed">
          Fixed: <input name='fixo' placeholder='drop desired player here' required>
        </div>
        <br>
        <div class="rightwing">
          Right-Wing: <input name='ala_dir' placeholder='drop desired player here' required>
        </div>
        <br>
        <div class="leftwing">
          Left-Wing: <input name='ala_esq' placeholder='drop desired player here' required>
        </div>
        <br>
        <div class="target">
          Target: <input name='pivo' placeholder='drop desired player here' required>
        </div>
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

    <div class="formation-manager__drop-target"><div class="formation-slot formation-slot--interactive"><div class="formation-slot__card"><div class="empty-card"></div><div class="card-pedestal"><div class="card-pedestal__background"><div class="card-pedestal__background-bonus-div"></div></div><div class="card-pedestal__label">CM</div><div class="card-pedestal__spinny-arrow"><svg class="arrow-circle" width="100" height="100" viewBox="0 0 100 100"><g class="arrow-circle__top-arrow"><path d="M 20 40 A 31 31, 0, 0, 1, 80 40" fill="none" stroke="red" stroke-linecap="round" stroke-width="10"></path><path d="M 68 33 l 12 7 l 2 -13" fill="none" stroke="red" stroke-linecap="round" stroke-width="10"></path></g><g class="arrow-circle__bottom-arrow"><path d="M 20 60 A 31 31, 0, 0, 0, 80 60" fill="none" stroke="red" stroke-linecap="round" stroke-width="10"></path><path d="M 32 67 l -12 -7 l -2 13" fill="none" stroke="red" stroke-linecap="round" stroke-width="10"></path></g></svg></div></div></div></div></div>
</div>
</body>
</html>