<?php
        
class saidaestoque{
    private $idprodutos;
    private $qtd_produtos;
    private $qtd_saida;
    private $dt_saida;
    private $id_funcionario;
    private $nr_pedido;
    private $identrada_estoq;
    

    public function __get($valor){
        return $this->$valor;
    }
    public function __set($propriedade,$valor){
        $this->$propriedade = $valor;
    }


    function mostrarProdutos(){
        $conexao =  conectar();
        $sql="SELECT b.identrada_estoq , b.lote_fabricacao,b.qtd_produtos,a.nm_fabricante,
        a.nm_produto,a.idprodutos  FROM entrada_estoq as b 
        INNER JOIN produto as a where a.idprodutos = b.id_produto ORDER BY a.nm_produto";
        $sth=$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


          
    function salvarSaida($dados){
        $conexao = conectar();
        $subtr=$this->qtd_produtos - $this->qtd_saida;
        if($subtr > 0){
        $sqlInserte="INSERT INTO saida_produto (id_produto, qtd_produtos, dt_saida, id_funcionario, 
        nr_pedido) VALUES(?,?,?,?,?)";

        $sth =$conexao->prepare($sqlInserte);
        $sth->bindParam(1, $this->idprodutos);
        $sth->bindParam(2, $this->qtd_saida);
        $sth->bindParam(3, $this->dt_saida);
        $sth->bindParam(4, $this->id_funcionario);
        $sth->bindParam(5, $this->nr_pedido);
        $sth->execute();
        $result=$sth->fetch();

        $sqlUpdate= "UPDATE entrada_estoq SET qtd_produtos = $subtr WHERE identrada_estoq =? ";
        $sth =$conexao->prepare($sqlUpdate);
        $sth->bindParam(1, $this->identrada_estoq);
        $sth->execute();
        $result=$sth->fetch();

        $conexao = null;
        if(!$result){
            $_SESSION["mensagem"]="Pedido Salvo com sucesso com sucesso";
            }else{
                $_SESSION["mensagem"]="erro";
    
            }
    }else{
        $_SESSION["mensagem"]="O seu pedido é maior que o estoque";

    }
}
    

}//classe 

function conectar(){

    $host="localhost";
    $dbName="almox";
    $userName="root";
    $pass="78541200";
    try{
        $opcoes = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        $con = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbName, $userName, $pass,$opcoes );

    }catch  ( PDOException $e ){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
         $e->getMessage();

    }

    return $con;
}  
        
        
        