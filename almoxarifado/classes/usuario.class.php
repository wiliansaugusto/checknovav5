<?php
 class usuario{
    private $idusuario;
    private $nm_usuario;
    private $nr_cpf;
    private $is_ativo;
    private $tp_usuario;


    public function __get($valor){
        return $this->valor;
    }
    public function __set($propiedade, $valor){
        $this->propiedade=$valor;
    }

    
    public function pesquisarTodos(){
        $conexao = conectar();
        $sql="SELECT * FROM usuario WHERE is_ativo=1 order by  nm_usuario";
        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;

        return $result;
    }
    public function desativar($dados){
        $conexao = conectar();
        $sql="UPDATE usuario SET is_ativo= 0 WHERE idusuarios = $dados";
        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetch();

        if(!$result){
        $_SESSION["mensagem"]="Usuário desativado com sucesso";
        }
        return $result;
    }
    public function alterarUsuario($dados){
        $conexao = conectar();
     $data = date("Y-m-d H:m:s");
        $sql="UPDATE usuario SET nm_usuario = ?, nr_cpf = ?,
        nm_login = ?, ds_senha = ?, tp_usuario = ? , dt_alteracao = ? WHERE idusuarios = ?";
        $sth =$conexao->prepare($sql);
        $sth->bindParam(1, $dados['nm_usuario']);
        $sth->bindParam(2, $dados['nr_cpf']);
        $sth->bindParam(3, $dados['nm_login']);
        $sth->bindParam(4, $dados['ds_senha']);
        $sth->bindParam(5, $dados["tp_usuario"]);
        $sth->bindParam(6, $data);
        $sth->bindParam(7, $dados["idusuarios"]);
        $sth->execute();
        $result=$sth->fetch();

        if(!$result){
        $_SESSION["mensagem"]="Usuário modificado com sucesso";
        }
        

        return $result;
    }
}

 function conectar(){

    $host="localhost";
    $dbName="almox";
    $userName="root";
    $pass="78541200";

    try{
        $opcoes = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $con = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbName, $userName, $pass,$opcoes );
       
    }catch  ( PDOException $e ){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
    if($con){
        //echo "conectado<br>";
    }
    return $con;
}