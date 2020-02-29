<?php
session_start();


?>

<!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>
      <!-- css propio-->
      <link type="text/css" rel="stylesheet" href="css/almoxarifado.css"  media="screen,projection"/>
      <script type="text/javascript" src="js/meu.js"></script>

     
    </head>

    <body>
    <?php include('navegacao.php');?>
    

    
  <div class=" card-panel blue">
    
    <div class=" row">
     <div class="col l4  s12   "></div>
        <div class="col l4 s12">
         <div class="card-panel ">

          <h2 class="center-align">Login</h2>
          <form  action="conexao.php" method="post">


          <div class="row center-align">
          <div class="input-field col s12 l12">
          
            <input name="nm_usuario" value="" id="nm_usuario" type="text" class="validate">
            <label class="" for="nm_usuario"><i class="small material-icons">  assignment_ind</i>
            <span class="">Nome de Usuário</span></label>
          </div>
          </div>

          <div class="row">
          <div class="input-field col l12 s12">
          
            <input  name="senha" value="" id="senha" type="password" class="validate">
            <label class="" for="senha"><i class="small material-icons">check</i>
            <span class="">  Senha</span></label>
          </div>
          </div>

      <div class="center-align">
          <button class=" btn-large waves-effect waves-light" type="submit" name="logar">Enviar  
      <i class="material-icons right">send</i>
    </button>
    </div>
          
        </form>
        <p class="center-align"><strong> Esqueceu a senha? </strong>
        <a href="redefinirsenha.php"> &nbsp &nbsp clique aqui!</p></a>


        </div>
    </div>
    <div class="col l4 s12">
    </div>

    </div>
  </div>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

    <?php include('peAlmox.php')?>
  </html>
        