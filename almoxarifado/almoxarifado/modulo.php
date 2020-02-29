<?php 
session_start();
$_SESSION["mensagem"] = "Bem Vindo";
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
    
<div class=" row card-panel">
        <div class="col s4 card-panel deep-purple darken-3 cyan-text text-lighten-5">
        <a href="insereusuario.php"><p class="cyan-text text-lighten-4 center-align">
        <i class="material-icons left">face</i>  Cadastrar novo usuário</p></a>
        </div>
        <div class=" light-blue darken-4 red-text col s4 card-panel">
        <a href="novoproduto.php"><p class=" white-text center-align">
        <i class="material-icons  left">assignment_turned_in</i>Cadastrar novo produto</p></a>
        </div>
        <div class=" grey darken-3 grey-text text-lighten-5 col s4 card-panel">
        <a href="entradaestoque.php"><p class="grey-text text-lighten-4 center-align">
        <i class="material-icons left">add_circle_outline</i> Inserir produto no estoque</p></a>
        </div>

        </div>  
</div>
<div class=" row card-panel">
        <div class=" brown darken-3 grey-text text-lighten-5 col s4 card-panel">
        <a href="saidaestoque.php"><p class="grey-text text-lighten-4 center-align">
        <i class="material-icons left">remove_circle_outline</i> Saída do estoque</p></a>
        </div>
        <div class=" blue darken-3 grey-text text-lighten-5 col s4 card-panel">
        <a href="relatorios.php"><p class="grey-text text-lighten-4 center-align">
        <i class="material-icons left">list_alt</i> Relatórios Diversos</p></a>
        </div>
        <div class=" green darken-3 grey-text text-lighten-5 col s4 card-panel">
        <a href="pesquisarusuario.php"><p class="grey-text text-lighten-4 center-align">
        <i class="material-icons left">facecreate</i> Alterar dados de usuário</p></a>
        </div>

        </div>  
</div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>



    <?php include('peAlmox.php')?>

</body>
</html>
