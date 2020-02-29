<?php
session_start();
include("classes/saidaestoque.class.php");
$entrada = new saidaestoque();
$objEntrada= $entrada->mostrarProdutos();

if($_POST["expedir"]==1){
    $entrada->qtd_saida = $_POST["qtd_saida"];
    $entrada->nr_pedido = $_POST["nr_pedido"];
    $entrada->dt_saida = date("Y/m/d");
    $entrada->id_funcionario=$_SESSION['id_usuario'];
    $entrada->idprodutos=$_POST["idprodutos"];
    $entrada->qtd_produtos=$_POST["qtd_produtos"];
    $entrada->identrada_estoq=$_POST["identrada_estoq"];
    $entrada->salvarSaida($entrada); 
     header("Location:saidaestoque.php");

}

?>
<!DOCTYPE html>
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
    <div class="row">
        <div class="col s12">
            <h4>Liberar produtos</h4>
        </div>
    </div>
    <div class="row">
    <div class="col s12">
        <table class="striped  ">
            <thead>
                <tr>
                <th>Produto</th>
                <th>Fabricante</th>
                <th>Estoque</th>
                <th>Lote</th>
                <th>Quantidade</th>
                <th>Nr Pedido</th>
                <th>salvar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($objEntrada as $value):
                    
                ?>
                    <form action="saidaestoque.php" method="post">

                <tr>
                    <td><input hidden type="text" name="identrada_estoq" value="<?=$value["identrada_estoq"]?>" ><?=$value["nm_produto"]?></td>
                    <td><?=$value["nm_fabricante"]?></td>
                    <td><input name="qtd_produtos"  value="<?=$value["qtd_produtos"]?>"hidden type="number" class="validate"> <?=$value["qtd_produtos"]?>  </td>
                    <td><input hidden type="text" name="idprodutos" value="<?=$value["idprodutos"]?>" > <?=$value["lote_fabricacao"]?>  </td>
                    <td>
                    <div class="input-field ">
                        <input name="qtd_saida" id="qtd_saida<?=$value["identrada_estoq"]?>" value="" type="number" class="validate">
                        <label for="qtd_saida<?=$value["identrada_estoq"]?>">Quantidade saída</label> 
                        </div> </td>
                        <td>
                        <div class="input-field ">
                        <input name="nr_pedido" id="nr_pedido<?=$value["identrada_estoq"]?>" value="" type="number" class="validate">
                        <label for="nr_pedido<?=$value["identrada_estoq"]?>">Numero do Pedido</label> 
                        </div>
                        </td>
                    <td> 
                    <button  class=" btn-large waves-effect waves-light" value="1" name="expedir" type="submit" >Expedir  
                        <i class="material-icons right">add</i>
                            </button>
                     </td>

</form>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table><br><br>
        <div class="center-align">
            
            <a href='modulo.php'>
            <button name='inseri' class=' btn-large waves-effect waves-light' type='button' >Voltar  
        <i class='material-icons right'>send</i>
            </button></a>
      </div>
        </form>
        </div>
        
                    </div>
    </div>
</div>

  
    <?php include('peAlmox.php')?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/meu.js"></script>

</body>
</html>