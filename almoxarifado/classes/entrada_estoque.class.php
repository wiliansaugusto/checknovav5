<?php

class entrada_estoque {

   private $identrada_estoq;
   private $id_produto;
   private $qtd_produtos;
   private $vl_produto;
   private $lote_fabricacao;
   private $validade_produto;
   private $dt_entrada;
   private $id_funcionario;


   public function __get($valor){
    return $this->$valor;
    }
    public function __set($propriedade,$valor){
        $this->$propriedade = $valor;
    }
    
   

    function mostrarProdutos(){
        $conexao =  conectar();
        $sql="SELECT idprodutos, nm_produto ,nm_fabricante FROM produto order by nm_produto;";
        $sth=$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function salvar($dados){
        echo $this->dt_entrada;
        $conexao =  conectar();
        $sql="INSERT INTO entrada_estoq (id_produto, qtd_produtos, vl_produto, lote_fabricacao,
        validade_produto, dt_entrada, id_funcionario)VALUES(?,?,?,?,?,?,?)";

        $sth = $conexao->prepare($sql);
        $sth->bindParam(1, $this->id_produto);
        $sth->bindParam(2, $this->qtd_produtos);
        $sth->bindParam(3, $this->vl_produto);
        $sth->bindParam(4, $this->lote_fabricacao);
        $sth->bindParam(5, $this->validade_produto);
        $sth->bindParam(6, $this->dt_entrada);
        $sth->bindParam(7, $this->id_funcionario);
        $result = $sth->execute();
        if($result){
            $_SESSION['mensagem']=  "Estoque atualizado com sucesso";
            //header("Location:insereusuario.php");
        
            }else{
                $_SESSION['mensagem']=  "Erro ao inserir os dados";
    
    }

    }
}
function conectar(){
    $host="localhost";
    $dbName="almox";
    $userName="root";
    $pass="78541200";
    try{
        $opcoes = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        );
        $con = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbName, $userName, $pass,$opcoes );
        return $con;

    }catch  ( PDOException $e ){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        return $con . $e->getMessage();

    }


}
?>