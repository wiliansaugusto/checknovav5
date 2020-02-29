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
    <?php include('navegacao.php');
    
    if((isset($_SESSION["id_usuario"]) == null)){
        echo("
            
        <div class='corpo card-panel'>
    
        <div class=' row'>
         <div class='col s2'></div>
            <div class='col s8'>
             <div class='card-panel'>
    
              <h2 class='center-align'>Redefinir senha</h2>
              <form  action='almoxarifado/conexao.php' method='post'>
    
    
              <div class='row'>
              <div class='input-field col s12'>
              
                <input name='nr_cpf' value='' id='nr_cpf' type='text' class='validate'>
                <label class='center-align' for='nr_cpf'><i class='small material-icons'>new_releases</i>
                <span class='center-align'>Informe o CPF</span></label>
              </div>
              </div>
    
          <div class='center-align'>
              <button class=' btn-large waves-effect waves-light' type='submit' name='redf'>Enviar  
          <i class='material-icons right'>send</i>
        </button><br><br>
        <a href='index.php'>
            <button name='inseri' class=' btn-large waves-effect waves-light' type='button' >Voltar  
        <i class='material-icons right'>send</i>
            </button></a>
        </div>
              
            </form>
            </div>
        </div>
        <div class='col s2'>
        </div>
    
        </div>
      </div>
        
        ");
    }elseif(isset($_SESSION["id_usuario"])) {

        $id  = $_SESSION["id_usuario"];

        $host="localhost:3306";
        $dbName="almox";
        $userName="root";
        $pass="78541200";

        try{
            $conexao = new PDO( 'mysql:host=' . $host . ' ;dbname=' . $dbName, $userName, $pass );
        }catch  ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
        if($conexao){
            echo "conectado<br>";
        }
        
        $sql="SELECT * from almox.usuario where idusuarios=?";

        $sth = $conexao->prepare($sql);
        $sth->bindParam(1,$id);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
        echo ($key." - " .$value."<br>"); 
     }


        echo("
        <div class='  card-panel'>
        <h3 class='center-align'>Insira a nova senha</h3>
      <form  action='conexao.php' method='post'>
      <div class='row'>
        
        <div class='input-field col s6'>
          <i class='material-icons prefix'>vpn_key</i>
          <input value=''name='ds_senha' id='ds_senha' type='text' class='validate'>
          <label for='ds_senha'>Senha</label>
        </div>
      </div>
      
      <div class='center-align'>
            <button name='alt' class=' btn-large waves-effect waves-light' type='submit' >Enviar  
        <i class='material-icons right'>send</i>
            </button>
            <div class='center-align'>
            
      </div>
          
    </form>
</div>
        ");
    }
?>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/meu.js"></script>
    </body>

    <?php include('peAlmox.php')?>
  </html>
        