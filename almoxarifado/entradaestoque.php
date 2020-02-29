<?php
include("classes/entrada_estoque.class.php");
session_start();
$n = new entrada_estoque();
$result=$n->mostrarProdutos();

if(isset($_POST['id_produto'])){
    $obj = new entrada_estoque();
    $obj->id_funcionario=$_SESSION['id_usuario'];
    $obj->dt_entrada = date("Y/m/d");
    foreach ($_POST as $key => $value) {
      $obj->$key=$value;
    }
      $obj->salvar($obj);
      unset($obj);
    }

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
<div class="card-panel">
<div class="input-field col s12">
<h4 class="center-align">Insira o produto no estoque</h4>
</div>
<div class="row">
    <div class="input-field col s12">
    <form  action="entradaestoque.php" method="post">

    <select name="id_produto">
    <option value="" disabled selected>Produtos</option>

        <?php 

        foreach ($result as $key ):
        ?>
        
      <option value="<?=$key["idprodutos"]?>"><?=$key["nm_produto"]?> - <?=$key["nm_fabricante"]?></option>
           
   
    <?php endforeach;?>
    </select>
    <label>Escolha o Produto</label>
  </div>

  </div>
  <div class="row">
          <div class="input-field col s6">
          <input name="qtd_produtos" id="qtd_produtos" type="number" class="validate">
          <label for="qtd_produtos">Insira a quantidade do produto</label>
        </div>
        <div class="input-field col s6">
          <input name="vl_produto" id="vl_produto" type="text" class="validate">
          <label for="vl_produto">valor da nota fiscal</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s6">
          <input name="lote_fabricacao" id="lote_fabricacao" type="number" class="validate">
          <label for="lote_fabricacao">Lote do Produto</label>
        </div>
        <div class="input-field col s6">
          <input name="validade_produto" id="validade_produto" type="date" class="validate">
          <label for="validade_produto">Validade do Produto</label>
        </div>
      </div>
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
  </div>

    <?php include('peAlmox.php')?>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/meu.js"></script>

</body>
</html>