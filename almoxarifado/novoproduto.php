<?php 
include("classes/produto.class.php");
session_start();
if($_SESSION["tp_usuario"]=="administrativo"){
  $_SESSION["mensagem"] = "Seja Bem Vindo ".$_SESSION["nomeUsuario"];
}else{

$_SESSION["mensagem"]= "Usuário ".$_SESSION["nomeUsuario"]." não permitido";
header("Location:modulo.php");

}

if(isset($_POST['nm_produto'])){
  $obj = new produto();
  $obj->idusuario=$_SESSION['id_usuario'];
  $obj->dt_alteracao = date("Y/m/d");
  $obj->is_ativo="1";
  foreach ($_POST as $key => $value) {
    $obj->$key=$value;}
    $obj->salvar($obj);
  }
  
?>
<!DOCTYPE html>
  <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>
      <!-- css propio-->
      <link type="text/css" rel="stylesheet" href="../css/almoxarifado.css"  media="screen,projection"/>
      <script type="text/javascript" src="../js/meu.js"></script>

     
    </head>

    <body>
    <?php include('navegacao.php');?>
<div class="  card-panel">
        <h3 class="center-align">Cadastrar produto</h3>
      <form  action="novoproduto.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input name="nm_produto"id="nm_produto" type="text" class="validate">
          <label for="nm_produto">Nome do Produto</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <textarea name="desc_produtos" id="desc_produto" class="materialize-textarea"></textarea>
          <label for="desc_produto">Descrição do Produto</label>
        </div>
       
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="tp_produto"id="tp_produto" type="text" class="validate">
          <label for="tp_produto">Tipo do Produto</label>
        </div>
        <div class="input-field col s6">
          <input name="nm_fabricante" id="nm_fabricante" type="text" class="validate">
          <label for="nm_fabricante">Nome do fabricante</label>
        </div>
        <div class="input-field col s6">
          <input name="nm_vendedor" id="nm_vendedor" type="text" class="validate">
          <label for="nm_vendedor">Nome do Vendedor</label>
        </div>
      </div>
     

      <div class="row">
      <div class="input-field col s4">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">E-mail</label>
        </div>
        <div class="input-field col s4">
        <input name="ctt1" id="ctt1" type="tel" class="validate">
          <label for="ctt1">Telefone Comercial<label>
        </div>
        <div class="input-field col s4">
        <input name="ctt2" id="ctt2" type="tel" class="validate">
          <label for="ctt2">Telefone Celular<label>
        </div>
</div>



      <div class="center-align">
            <button  class=" btn-large waves-effect waves-light" type="submit" >Enviar  
        <i class="material-icons right">send</i>
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
