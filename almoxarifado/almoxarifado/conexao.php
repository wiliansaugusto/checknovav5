<?php
//variaveis da sessão

session_start();
$host="localhost";
    $dbName="u142585150_checknova";
    $userName="u142585150_checknova";
    $pass="785412Wiza";
try{  $opcoes = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexao = new PDO('mysql:host='.$host.';dbname=' .$dbName, $userName , $pass , $opcoes);
}catch  ( PDOException $e ){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
var_dump($conexao);
if($conexao){
    echo "conectado<br>";
}
    

if(isset($_POST["logar"])){

 

    $sql = "SELECT idusuarios,nm_login, nm_usuario, ds_senha,is_ativo ,tp_usuario FROM usuario 
    WHERE nm_login = '".$_POST['nm_usuario']."'  and ds_senha = '".$_POST['senha']."' and is_ativo='1'; ";

    
    $sth = $conexao->prepare($sql);
    $sth->execute();
    $result = $sth->fetch();
    $_SESSION['nm_usuario'] = $result["nm_login"];
    $_SESSION['tp_usuario'] = $result["tp_usuario"];
    $_SESSION['id_usuario'] = $result['idusuarios'];
    $_SESSION['nomeUsuario'] = $result['nm_usuario'];
    $_SESSION['mensagem'];

    if(isset($_SESSION['nm_usuario'])){
        header("Location:modulo.php");
    }else{
        var_dump($sql);
        $_SESSION['nm_usuario'] = "Nome de Usuário ou Senha invalida";
        
        header("Location:index.php");

    }
    $sth->close();
    $conexao->close();
}

if(isset($_POST['inseri'])){
    
    $sqlUsuario="SELECT nm_login FROM usuario WHERE nm_login = $_POST[nm_login]";
    $status=$conexao->prepare($sqlUsuario);
    $status->execute();
    $result= $status->fetchAll();
    echo  $result;
    
    if($result == FALSE ){

    $data= date("Y/m/d");
    $isAtivo="1";
    $nome =$_POST["nm_usuario"];
    $login = $_POST["nm_login"];
    $senha=$_POST["ds_senha"];
    $email = $_POST["email"];
    $CPF= $_POST["nr_cpf"];
    $responsavel=$_SESSION["tp_usuario"];

    $sqlPesquisa= "SELECT nr_cpf FROM 	u142585150_checknova.usuario where nr_cpf='".$CPF."'";
    $sthp= $conexao->prepare($sqlPesquisa);
    $sthp->execute();
    $result = $sthp->fetch(PDO::FETCH_ASSOC);
    if($result["nr_cpf"] === $CPF){
    $_SESSION["mensagem"] = "Usuario já cadastrado";
    header("Location:insereusuario.php");

    }else{
    $sqlIns="INSERT INTO u142585150_checknova.usuario (nm_usuario, nm_login, ds_senha,email, nr_cpf, is_ativo, dt_alteracao, 
    tp_usuario) VALUES (?,?,?,?,?,?,?,?)";
    $sth = $conexao->prepare($sqlIns);
    $sth->bindParam(1, $nome);
    $sth->bindParam(2, $login );
    $sth->bindParam(3, $senha);
    $sth->bindParam(4, $email );
    $sth->bindParam(5, $CPF );
    $sth->bindParam(6, $isAtivo);
    $sth->bindParam(7, $data);
    $sth->bindParam(8, $responsavel);
    $result = $sth->execute();

    if($result){
    $_SESSION['mensagem']=  "Usuário Inserido com sucesso";
    header("Location:insereusuario.php");

    }else{
    echo $sqlIns."<br>erro";
    }
    }
        }else{
            $_SESSION['mensagem']=  "Usuário". $_POST["nm_usuario"]."já cadastrado em nosso sistema";

    }
}

if(isset($_POST['redf'])){

    $CPF = $_POST['nr_cpf'];
    $sqlPesquisa= "SELECT * FROM u142585150_checknova.usuario where nr_cpf=?";
    $sthp= $conexao->prepare($sqlPesquisa);
    $sthp->bindParam(1,$CPF);
    $sthp->execute();
    $result = $sthp->fetch(PDO::FETCH_ASSOC);
  
    if($result){
        $_SESSION["mensagem"]="Usuário: ".$result['nm_login'];
        $_SESSION["id_usuario"]=$result['idusuarios'];
        header("Location:redefinirsenha.php");


    }else{
        $_SESSION["mensagem"] = "Usuário não cadastrado";
        header("Location:redefinirsenha.php");

    }
}
if(isset($_POST['alt'])){

        $id = $_SESSION['id_usuario'];
        $data= date("Y/m/d");
        $isAtivo="1";
        $nome =$_POST["nm_usuario"];
        $login = $_POST["nm_login"];
        $senha=$_POST["ds_senha"];
        $email = $_POST["email"];
        $CPF= $_POST["nr_cpf"];
        $responsavel=$_SESSION["tp_usuario"];

        $sqlAlt= "UPDATE u142585150_checknova.usuario 
        SET ds_senha=?, dt_alteracao=?  WHERE idusuarios=?;
        ";
        $sthpa= $conexao->prepare($sqlAlt);
        
        $sthpa->bindParam(1,$senha);
        $sthpa->bindParam(2,$data);
        $sthpa->bindParam(3,$id);
        $result = $sthpa->execute();
        if($result){
        $_SESSION["mensagem"]= "Usuario alterado com sucesso com sucesso";
        
        $_SESSION["id_usuario"] =NULL;
        header("Location:index.php");

        }else{
        echo $sqlAlt."<br>erro";
        
        echo($_SESSION['mensagem']);

        }
       
    }
    $pdo =null;
    $conexao = null;   
