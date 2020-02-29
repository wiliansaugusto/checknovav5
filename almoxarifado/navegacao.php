<?php
session_start();
if(isset($_POST["sair"])){
  session_destroy();


header("Location:index.php");
}
?>

<div class="navegar">
<nav >
<div class="row nav-wrapper green accent-2">
    <div class="col l1 s3 nav-wrapper green accent-2 "  >
      <img  style="width:100px; " src="assets/img/starhealthSemfundo.png" alt="StarHealth" srcset="">
      
      </div>
      <div class="col l3  s3 nav-wrapper green accent-2 "  >
      <a href="modulo.php"><i class="material-icons left-align ">home</i></a>
      </div>
      <div class="col l5 s6 nav-wrapper green accent-2  center-align"> <strong class="red-text text-darken-3"><?= $_SESSION["mensagem"]?></strong></div>
      <div class="col l2 s8 nav-wrapper green accent-2  right-align">
      <span class="teal-text text-darken-3">
      <?= $_SESSION["nm_usuario"]?></span></div>
      <div class="col l1 s4 nav-wrapper green accent-2  left-align">
      <form action="navegacao.php" method="post">
      <input class="btn-small waves-effect waves-teal  blue" type="submit" value="sair" name="sair">
      </form>
      </div>
      
       
    </div>
    </div>
  </nav>
