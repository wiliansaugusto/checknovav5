<?php 
session_start();
if($_SESSION["tp_usuario"]=="administrativo"){
        $_SESSION["mensagem"] = "Seja Bem Vindo ".$_SESSION["nomeUsuario"];
}else{

  $_SESSION["mensagem"]= "Usuário ".$_SESSION["nomeUsuario"]." não permitido";
  header("Location:modulo.php");

}

?>
<!DOCTYPE html>
  <html lang="pt-br">
    <head>
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
<div class="  card-panel">
        <h3 class="center-align">Inserir novo usuário</h3>
      <form accept-charset="UTF-8" action="conexao.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input name="nm_usuario"id="nm_usuario" required type="text" class="validate">
          <label for="nm_usuario">Nome do usuaŕio completo</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">perm_contact_calendar</i>
          <input name="nm_login"id="nm_login" type="text" class="validate" required>
          <label for="nm_login">Login do Usuário</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">vpn_key</i>
          <input name="ds_senha" id="ds_senha" type="password" class="validate" required>
          <label for="ds_senha">Senha</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">mail</i>
          <input name="email"id="email" type="email" class="validate" required>
          <label for="email">E-mail</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">filter_9_plus</i>
          <input name="nr_cpf" id="nr_cpf" type="number" class="validate"required>
          <label for="nr_cpf">Insira os números do CPF</label>
        </div>
      </div>
      <div class="row">
      <p class="center-align">Tipo de usuário:  
      <label>
        <input name="tp_usuario" type="radio" value="administrador"  />
        <span>Administrador</span>
      </label>
    
      <label>
        <input name="tp_usuario" type="radio" value="operacional" checked/>
        <span>Operacional</span>
      </label></p>
        </div><br>
      <div class="center-align">
            <button name="inseri" class=" btn-large waves-effect waves-light" type="submit" >Savar  
        <i class="material-icons right">save</i>
            </button>
            <a href='modulo.php'>
            <button name='inseri' class=' btn-large waves-effect waves-light' type='button' >Voltar  
        <i class='material-icons right'>send</i>
            </button></a>
      </div>
          
    </form>
</div>


      <?php include('peAlmox.php')?>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/meu.js"></script>


</body>
</html>
