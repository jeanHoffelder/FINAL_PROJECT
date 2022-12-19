<html>
<div class='containerfh1'>
  <img src="Campofutsal.png" alt="">
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
</div>
</body>
</html>