<?php
session_start();
require_once("classes/relatorio.class.php");
$obj = new relatorio();
if(isset($_POST['montar'])==1){
    $obj->result = $_POST['dados'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('d/m/Y H:i');
    $obj->montarPDF($obj->result, $_SESSION['nomeUsuario'], $data, $_POST['datas']);


}

if(isset($_POST)=="NULL"){
    $retorno="<h4 class='center-align'> Olá seja bem vindo aos relatórios padrões</h4>
                <p class='center-align'>Basta clicar nos botões acima para gerar relatorios sobre a atual situação do seu 
                estoque.</p>
                <p class='center-align'>Você também pode realizar pesquisar por lote, 
                fabricante ou nome do produto</p> ";
               
               

            }
if(isset($_POST['trinta'])==1){
    $retorno =$obj->pesquisar30();
    $_POST['trinta'] = null;


}
if(isset($_POST['sessenta'])==1){
    $retorno =$obj->pesquisar60();
    $_POST['trinta'] = null;

}
if(isset($_POST['noventa'])==1){
    $retorno =$obj->pesquisar90();
    $_POST['trinta'] = null;
    
}
if(isset($_POST['centovinte'])==1){
    $retorno =$obj->pesquisar120();
    $_POST['trinta'] = null;

}
if(isset($_POST['maior'])==1){
    $retorno =$obj->maior();
    $_POST['trinta'] = null;

}
if(isset($_POST['pesquisa'])==1){
    $valor1=
    $retorno=$obj->pesquisaEsp($_POST["id_select"],$_POST["tp_pesquisar"]);

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


    <form action='relatorios.php' method='post'>
    <div class='card-panel'>
            <div class='row'>
            <h4 style="font-family: 'Lemonada', cursive;" class="center-align">Verificadores de Validades</h4>
            <div class='col '>
    
                        <button type='submit' class='  waves-effect waves-light btn-large' name='maior' value='1'>Todos</button>
    
                </div>
                <div class='col '>
    
                        <button type='submit' class='  waves-effect waves-light btn-large' name='trinta' value='1'>Menos de 30 dias</button>
    
                </div>
                <div class='col '>
    
                        <button type='submit'class='  waves-effect waves-light btn-large'  name='sessenta' value='1'>Entre 30 e 60 dias</button>
    
                </div>
                <div class='col '>
    
                        <button type='submit' class='  waves-effect waves-light btn-large' name='noventa' value='1'>Entre 60 e 90 dias</button>
    
                </div>
                <div class='col '>
    
                        <button type='submit' class='  waves-effect waves-light btn-large' name='centovinte' value='1'>Entre 90 e 120 dias</button>
    
                        </div>
                </div>
                <hr style="height:6px; border:none; color:black; background-color:#0d47a1;">      <br>          <div class='row'>
                <h4 style="font-family: 'Lemonada', cursive;" class="center-align">Relátorios Diversos</h4>

                <div class='col s4 input-field'>
                <select  name="id_select">
                    <option value="" disabled selected>Pesquisar</option>
                    <option value="nm_fabricante">Fabricante</option>
                    <option value="lote_fabricacao">Lote</option>
                    <option value="nm_produto">Nome do Produto</option>
                    <option value="nr_pedido">Número de ordem</option>
                    </select>
                    <label>Pesquisa especifica</label>
                </div>
                <div class='col s4 input-field'>
                    
                    <input  name="tp_pesquisar" id="tp_pesquisar" type="text" class="validate">
                    <label for="tp_pesquisar">Digite a informação</label>
                    </div>

                <div class='col s4 '>
                    <button name='pesquisa' value="1" class=' btn-large waves-effect waves-light' type='submit' >Pesquisar  
                <i class='material-icons right'>send</i>
                    </button>
                    </div>
            </div>
        <div class="row">  
           </div>
        </form>
        <hr style="height:6px; border:none; color:black; background-color:#0d47a1;">                
        <div class='row'>

         <div class="card-panel">

        <?=$retorno?>
        </div>
        <div class="card-panel center-align">
        <div class="row">
            <div class="col l6 s12 right-align">
        <a  href='modulo.php'>
                <button name='inseri' class='center-align btn-large waves-effect waves-light' type='button' >Voltar  
            <i class='material-icons left'>arrow_back</i>
                </button></a>
                </div>
                <div class="col">
<form action="relatorios.php" target="_blank" method="post">
<input type="hidden" name="dados"  value="<?=$retorno?>">
                <button name='montar' value='1' class='center-align btn-large waves-effect waves-light' type='submit' >Gerar PDF  
            <i class='material-icons left'>send</i></button>
            </form>   
            </div>
            </div>
            </div>

        </div>

   <?php include('peAlmox.php')?>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/meu.js"></script>


</body>
</html>