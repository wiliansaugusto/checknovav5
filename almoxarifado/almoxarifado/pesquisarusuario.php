<?php
session_start();
include("classes/usuario.class.php");
$user = new usuario();
$rs=$user->pesquisarTodos();

if($_POST["desativar"]){
    $rs = $user->desativar($_POST["desativar"]);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}

if($_POST['alterar']==1){
        
    $rs=$user->alterarUsuario($_POST);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";

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
    <div class="row">
        <div class="col s12">
            <h4>Pesquisar usuários</h4>
        </div>
    </div>
    <div class="row">
    <div class="col s12">
        <table class="striped">
            <thead>
                <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>CPF</th>
                <th>Alterar</th>
                <th>Desativar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rs as $value):
                    
                ?>
                <tr>
                    <td><input hidden type="text" name="idusuarios" value="<?=$value["idusuarios"]?>" ><?=$value["nm_usuario"]?></td>
                    <td><?=$value["nm_login"]?></td>
                    <td> <?=$value["nr_cpf"]?>  </td>


                    <td>
                    <button data-target="<?=$value['idusuarios']?>" class="btn-large modal-trigger">Alterar</button>
                    <div id="<?=$value['idusuarios']?>" class="modal">
                        <div class="modal-content">
                        <h4>Alterar o Usuário  </h4>
                        <h5><?=$value["nm_usuario"].$value['idusuarios']?></h5>
                        <form action="pesquisarusuario.php" method="post">
                        <input hidden type="text" name="idusuarios" value="<?=$value['idusuarios']?>">
                            <div class="row">
                            <div class="input-field col s6">
                            <input value="<?=$value['nm_usuario']?>" id="nm_usuario"  name="nm_usuario" type="text" class="validate">
                            <label class="active" for="nm_usuario">Nome</label>
                            </div>
                            <div class="input-field col s6">
                            <input value="<?=$value['nr_cpf']?>" id="cpf" name="nr_cpf" type="text" class="validate">
                            <label class="active" for="cpf">CPF</label>
                            </div>
                            </div>
                            <div class="row">
                            <div class="input-field col s6">
                            <input value="<?=$value['nm_login']?>" id="nm_login"  name="nm_login"type="text" class="validate">
                            <label class="active" for="nm_login">Login</label>
                            </div>
                            <div class="input-field col s6">
                            <input value="<?=$value['ds_senha']?>" id="ds_senha" name="ds_senha" type="text" class="validate">
                            <label class="active" for="ds_senha">Senha</label>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" name="alterar" value="1"
                            class="modal-close waves-effect waves-green btn-flat">Alterar</button>
                        </div>            
                        </form>
                        </div>
                                </td>

                    <form action="pesquisarusuario.php" method="post">
                    <td> <button  class=" btn-large waves-effect waves-light" 
                    value="<?=$value["idusuarios"]?>" name="desativar" type="submit" >Desativar  
                        <i class="material-icons right">close</i>
                            </button></td></form>
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