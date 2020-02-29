<?php
include_once 'vendor/autoload.php';


class relatorio{
    private $result;


    public function __get($valor){
        return $this->$valor;
    }
    public function __set($propriedade,$valor){
        $this->$propriedade = $valor;
    }

    public function montarPDF($result,$usuario,$data){
$peca="

<style>
table{
    width:100%;
}
table, th, td {
  border: 1px solid black;
}
th, td {
    padding: 15px;
    text-align: center;

}
th {
    background-color: black;
  color: white;
  
  }
  .imagem {
        width:150px;
       
  }
 

</style>
<body>

    <div class='grid-container' style='grid-auto-flow:row;'>
        <div class='item1'>
        <img  class='imagem' src='http://starhealth.com.br/almoxarifado/assets/img/starhealthSemfundo.png' alt='Imagem Starhealth'/> 
            </div>
            <div class='item2'>
        <h4>Estoque WEB</h4>
        </div>
    </div>
    <h3>Relatório gerando do estoque WEB por  ".$usuario." às ".$data." </h3>
    

    <div class='row'>
        <div class='col'>
        ".$result."
        </div>
    </div>
    </div>
    

";
        error_reporting(0);
        ini_set('display_errors', 0);
        
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);  
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($peca);
      
        $mpdf->Output();
        ob_clean();  // eh  aqui que a mágica acontece!  :)
        $mpdf->Output($pdfFilePath, \Mpdf\Output\Destination::INLINE);
        
    }

    public function pesquisar30(){
        $conexao = conectar();
        $sql="SELECT a.nm_produto , b.qtd_produtos, b.lote_fabricacao, 
        date_format(b.validade_produto , '%d/%m/%Y') validade_produto,
        DATEDIFF(validade_produto,CURRENT_DATE()) as qtd_dias FROM entrada_estoq as b 
        INNER JOIN produto as a WHERE DATEDIFF(b.validade_produto,CURRENT_DATE())<31
         AND b.id_produto = a.idprodutos  and b.qtd_produtos >0 order by a.nm_produto";

        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        if($result == null){

            $retorno = ("<h3>Informação não encontrada</h3>");
                }else{
                $retorno=("
                        <h5 class='center-align'>Vencimentos em até 30 dias</h5>
                <table  class='responsive-table'>
                        <thead>
                            <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Dias</th>
                            </tr>
                        </thead>
                        <tbody>");
                            
                            foreach ($result as $key ){
                               $retorno = $retorno .(" <tr>
                                <td>".$key[nm_produto]."</td>
                                <td>".$key[qtd_produtos]."</td>
                                <td>".$key[lote_fabricacao]."</td>
                                <td>".$key[validade_produto]."</td>
                                <td>".$key[qtd_dias]."</td>
                                </tr>
                                ");
                          
                            }
                            $retorno = $retorno .(" </tbody>
                        </table> ");
                        }
        
        return $retorno;
    }
    public function pesquisar60(){
        $conexao = conectar();
        $sql="SELECT a.nm_produto , b.qtd_produtos, b.lote_fabricacao, 
        date_format(b.validade_produto , '%d/%m/%Y') validade_produto,
        DATEDIFF(validade_produto,CURRENT_DATE()) as qtd_dias FROM entrada_estoq as b 
        INNER JOIN produto as a WHERE DATEDIFF(b.validade_produto,CURRENT_DATE())>31 and 
        DATEDIFF(b.validade_produto,CURRENT_DATE())< 61 AND b.id_produto = a.idprodutos  
        and b.qtd_produtos >0 order by a.nm_produto;";

        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        if($result == null){

            $retorno = ("<h3>Informação não encontrada</h3>");
                }else{
                $retorno=(
                    "   <h5 class='center-align'>Vencimentos entre 30 e 60 dias</h5>
                        <table class='responsive-table'>
                        <thead>
                            <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Dias</th>
                            </tr>
                        </thead>
                        <tbody>");
                            
                            foreach ($result as $key ){
                               $retorno = $retorno .(" <tr>
                                <td>".$key[nm_produto]."</td>
                                <td>".$key[qtd_produtos]."</td>
                                <td>".$key[lote_fabricacao]."</td>
                                <td>".$key[validade_produto]."</td>
                                <td>".$key[qtd_dias]."</td>
                                </tr>
                                ");
                          
                            }
                            $retorno = $retorno .(" </tbody>
                        </table> ");
                        }
        
        return $retorno;
    }
    public function pesquisar90(){
        $conexao = conectar();
        $sql="SELECT a.nm_produto , b.qtd_produtos, b.lote_fabricacao, 
        date_format(b.validade_produto , '%d/%m/%Y') validade_produto,
        DATEDIFF(validade_produto,CURRENT_DATE()) as qtd_dias FROM entrada_estoq as b 
        INNER JOIN produto as a WHERE DATEDIFF(b.validade_produto,CURRENT_DATE())>60 and 
        DATEDIFF(b.validade_produto,CURRENT_DATE())< 91 AND b.id_produto = a.idprodutos 
         and b.qtd_produtos >0 order by a.nm_produto;";
        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        if($result == null){

            $retorno = ("<h3>Informação não encontrada</h3>");
                }else{
                $retorno=(" <h5 class='center-align'>Vencimentos entre 60 e 90 dias</h5>
                            <table class='responsive-table'>
                        <thead>
                            <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Dias</th>
                            </tr>
                        </thead>
                        <tbody>");
                            
                            foreach ($result as $key ){
                               $retorno = $retorno .(" <tr>
                                <td>".$key[nm_produto]."</td>
                                <td>".$key[qtd_produtos]."</td>
                                <td>".$key[lote_fabricacao]."</td>
                                <td>".$key[validade_produto]."</td>
                                <td>".$key[qtd_dias]."</td>
                                </tr>
                                ");
                          
                            }
                            $retorno = $retorno .(" </tbody>
                        </table> ");
                        }
        
        return $retorno;
    }

    public function pesquisar120(){
        $conexao = conectar();
        $sql="SELECT a.nm_produto , b.qtd_produtos, b.lote_fabricacao, 
        date_format(b.validade_produto , '%d/%m/%Y') validade_produto,
        DATEDIFF(validade_produto,CURRENT_DATE()) as qtd_dias FROM entrada_estoq as b 
        INNER JOIN produto as a WHERE DATEDIFF(b.validade_produto,CURRENT_DATE())>90 and 
        DATEDIFF(b.validade_produto,CURRENT_DATE())< 121 AND b.id_produto = a.idprodutos  and 
        b.qtd_produtos >0 order by a.nm_produto;";

        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        if($result == null){

            $retorno = ("<h3>Informação não encontrada</h3>");
                }else{
                $retorno=("<h5 class='center-align'>Vencimentos entre 90 e 120 dias</h5>
                <table class='responsive-table'>
                        <thead>
                            <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Dias</th>
                            </tr>
                        </thead>
                        <tbody>");
                            
                            foreach ($result as $key ){
                               $retorno = $retorno .(" <tr>
                                <td>".$key[nm_produto]."</td>
                                <td>".$key[qtd_produtos]."</td>
                                <td>".$key[lote_fabricacao]."</td>
                                <td>".$key[validade_produto]."</td>
                                <td>".$key[qtd_dias]."</td>
                                </tr>
                                ");
                          
                            }
                            $retorno = $retorno .(" </tbody>
                        </table> ");
                        }
        
        return $retorno;
    }
    public function maior(){
        $conexao = conectar();
        $sql="SELECT a.nm_produto , b.qtd_produtos, b.lote_fabricacao, 
        date_format(b.validade_produto , '%d/%m/%Y') validade_produto,
        DATEDIFF(validade_produto,CURRENT_DATE()) as qtd_dias FROM entrada_estoq as b 
        INNER JOIN produto as a WHERE 
        b.id_produto = a.idprodutos  and b.qtd_produtos >0 order by nm_produto; ";

        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        if($result == null){

            $retorno = ("<h3>Informação não encontrada</h3>");
                }else{
                $retorno=("  <h5 class='center-align'>Todos os produtos do estoque</h5>
                        <table class='responsive-table'>
                        <thead>
                            <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Validade</th>
                            <th>Dias</th>
                            </tr>
                        </thead>
                        <tbody>");
                            
                            foreach ($result as $key ){
                               $retorno = $retorno .(" <tr>
                                <td>".$key[nm_produto]."</td>
                                <td>".$key[qtd_produtos]."</td>
                                <td>".$key[lote_fabricacao]."</td>
                                <td>".$key[validade_produto]."</td>
                                <td>".$key[qtd_dias]."</td>
                                </tr>
                                ");
                          
                            }
                            $retorno = $retorno .(" </tbody>
                        </table> ");
                        }
        
        return $retorno;
    }

    public function pesquisaEsp($valor1, $valor2){
        $conexao = conectar();

        if($valor1 == "nm_produto"){
            $sql="SELECT * FROM entrada_estoq as b inner join produto as a 
            where b.id_produto = a.idprodutos and a.$valor1 LIKE '%$valor2%'";
            if($valor2 == ""){
                $sql="SELECT * FROM entrada_estoq as b inner join produto as a 
                where b.id_produto = a.idprodutos order by a.nm_produto";
            }
        }

        if($valor1 == "lote_fabricacao"){
            $sql="SELECT * FROM entrada_estoq as b inner join produto as a 
            where b.id_produto = a.idprodutos and b.$valor1 = $valor2 order by b.lote_fabricacao;";

            if($valor2 ==""){   
                    $valor2=">1";
                    $sql="SELECT * FROM entrada_estoq as b inner join produto as a
                     where b.id_produto = a.idprodutos and b.$valor1 $valor2 order by  b.lote_fabricacao;";

            }

        }

        if($valor1=="nm_fabricante"){
            $sql="SELECT * FROM entrada_estoq as b inner join produto as a 
            where b.id_produto = a.idprodutos and a.$valor1 LIKE '%$valor2%' order by a.nm_fabricante";
            if($valor2 == ""){
                $sql="SELECT * FROM entrada_estoq as b inner join produto as a 
                where b.id_produto = a.idprodutos order by a.nm_fabricante";
            }
        }
        if($valor1=="nr_pedido"){
            $sql="SELECT c.nm_usuario, b.dt_saida, a.tp_produto, b.qtd_produtos, a.nm_produto , b.nr_pedido 
            FROM saida_produto as b inner join produto as a INNER Join usuario as c
             where b.id_produto = a.idprodutos and b.id_funcionario = c.idusuarios 
             and b.nr_pedido=$valor2 order by b.nr_pedido";
            if($valor2 == ""){
                $sql="SELECT c.nm_usuario, b.dt_saida, a.tp_produto, b.qtd_produtos, a.nm_produto , b.nr_pedido 
                FROM saida_produto as b inner join produto as a INNER Join usuario as c
                 where (b.id_produto = a.idprodutos and b.id_funcionario = c.idusuarios) 
                 and b.nr_pedido > 0 order by b.nr_pedido";
            }
        }

        $sth =$conexao->prepare($sql);
        $sth->execute();
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);
        $conexao = null;
        
        if(!$result){

            $_SESSION["mensagem"] = "Ítem não encontrado, refaça a pesquisa.";
                return $retorno="<h3 class='center-align'> Ítem não encontrado</h3>";
        }else{
            $_SESSION["mensagem"] = "Relatorio efetuado com sucesso!";

        }

        if($valor1=="nm_produto"){
            $retorno=("<table class='responsive-table'>
            <thead>
                <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Lote</th>
                <th>Validade</th>
                <th>Fabricante</th>
                <th>Vendedor</th>
                </tr>
            </thead>
            <tbody>");
                
                foreach ($result as $key ){
                    $dataBanco=date_create($key["validade_produto"]);
                    $data = date_format($dataBanco,"d/m/Y");

                   $retorno = $retorno .(" <tr>
                    <td>".$key[nm_produto]." - ".$key[tp_produto]."</td>
                    <td>".$key[qtd_produtos]."</td>
                    <td>".$key[lote_fabricacao]."</td>
                    <td>". $data."</td>
                    <td>".$key[nm_fabricante]."</td>
                    <td>Nome: ".$key[nm_vendedor]."<br> Telefone:".$key[ctt1]." <br >telefone: ".$key[ctt2]."<br>
                    email: ".$key[email]."</td>
                    </tr>
                    ");
              
                }
                $retorno = $retorno .(" </tbody>
            </table> ");
        }
        if($valor1=="nm_fabricante"){
            $retorno=("<table class='responsive-table'>
            <thead>
                <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Lote</th>
                <th>Validade</th>
                <th>Fabricante</th>
                <th>Vendedor</th>
                </tr>
            </thead>
            <tbody>");
                
                foreach ($result as $key ){
                    $dataBanco=date_create($key["validade_produto"]);
                    $data = date_format($dataBanco,"d/m/Y");

                   $retorno = $retorno .(" <tr>
                    <td>".$key[nm_produto]." - ".$key[tp_produto]."</td>
                    <td>".$key[qtd_produtos]."</td>
                    <td>".$key[lote_fabricacao]."</td>
                    <td>". $data."</td>
                    <td>".$key[nm_fabricante]."</td>
                    <td>Nome: ".$key[nm_vendedor]."<br> Telefone:".$key[ctt1]." <br >telefone: ".$key[ctt2]."<br>
                    email: ".$key[email]."</td>
                    </tr>
                    ");
              
                }
                $retorno = $retorno .(" </tbody>
            </table> ");
        }
        if($valor1 == "lote_fabricacao"){
            $retorno=("<table class='responsive-table'>
            <thead>
                <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Lote</th>
                <th>Validade</th>
                <th>Fabricante</th>
                <th>Vendedor</th>
                </tr>
            </thead>
            <tbody>");
                
                foreach ($result as $key ){
                    $dataBanco=date_create($key["validade_produto"]);
                    $data = date_format($dataBanco,"d/m/Y");

                   $retorno = $retorno .(" <tr>
                    <td>".$key[nm_produto]." - ".$key[tp_produto]."</td>
                    <td>".$key[qtd_produtos]."</td>
                    <td>".$key[lote_fabricacao]."</td>
                    <td>". $data."</td>
                    <td>".$key[nm_fabricante]."</td>
                    <td>Nome: ".$key[nm_vendedor]."<br> Telefone:".$key[ctt1]." <br >telefone: ".$key[ctt2]."<br>
                    email: ".$key[email]."</td>
                    </tr>
                    ");
              
                }
                $retorno = $retorno .(" </tbody>
            </table> ");
        }
        if($valor1 == "nr_pedido"){
            $retorno=("<table class='responsive-table'>
            <thead>
                <tr>
                <th>Nome do Solicitante</th>
                <th>Data da Solicitação</th>
                <th>Produto</th>
                <th>Quantidade Solicitada</th>
                <th>Numero do Pedido</th>
                </tr>
            </thead>
            <tbody>");
                
                foreach ($result as $key ){
                    $dataBanco=date_create($key["dt_saida"]);
                    $data = date_format($dataBanco,"d/m/Y");

                   $retorno = $retorno .(" <tr>
                    <td>".$key[nm_usuario]."</td>
                    <td>". $data."</td>
                    <td>".$key[nm_produto]." - ".$key[tp_produto]."</td>
                    <td>".$key[qtd_produtos]."</td>
                    <td>".$key[nr_pedido]."</td>
                    </tr>
                    ");
              
                }
                $retorno = $retorno .(" </tbody>
            </table> ");
        }
       
    
    return $retorno;
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