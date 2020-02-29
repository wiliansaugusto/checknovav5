<?php

class produto{
    
    private $nm_produto;
    private $desc_produtos;
    private $dt_alteracao;
    private $is_ativo;
    private $nm_fabricante;
    private $nm_vendedor;
    private $idusuario;
    private $email;
    private $ctt1;
    private $ctt2; 
    private $tp_produto; 
    


    public function __get($valor){
        return $this->$valor;
    }
    public function __set($propriedade,$valor){
        $this->$propriedade = $valor;
    }
  


    public function exibir($dados){

        foreach ($dados as $key => $value) {

            echo($key." - ".$value."<br>");
        }

    }

    public function salvar($dados){
        
        $host="185.201.10.94";
        $dbName="u142585150_checknova";
        $userName="u142585150_checknova";
        $pass="785412Wiza";

        try{
            $opcoes = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            );
            $con = new PDO( 'mysql:host=' . $host . ' ;dbname=' . $dbName, $userName, $pass,$opcoes );
        }catch  ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
        if($con){
            //echo "conectado<br>";
        }
        $sqls="INSERT INTO produto (nm_produto, desc_produtos, nm_fabricante, 
        nm_vendedor, idusuario, dt_alteracao, email, ctt1, ctt2, is_ativo, tp_produto)
         VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $sth = $con->prepare($sqls);
        $sth->bindParam(1, $this->nm_produto);
        $sth->bindParam(2, $this->desc_produtos );
        $sth->bindParam(3, $this->nm_fabricante);
        $sth->bindParam(4, $this->nm_vendedor);
        $sth->bindParam(5, $this->idusuario );
        $sth->bindParam(6, $this->dt_alteracao );
        $sth->bindParam(7, $this->email);
        $sth->bindParam(8, $this->ctt1);
        $sth->bindParam(9, $this->ctt2);
        $sth->bindParam(10, $this->is_ativo);
        $sth->bindParam(11, $this->tp_produto);
        $result = $sth->execute();
   
        if( $result){
        $_SESSION['mensagem']=  "Produto Inserido com sucesso";
        //header("Location:insereusuario.php");
    
        }else{
            var_dump ($sqls);
        echo $sqls."<br>erro<hr>";
        
        }
    }

}



