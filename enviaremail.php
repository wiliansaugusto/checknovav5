<?php


//Variaveis do PHP
require 'PhpMailer/PHPMailer.php';



$host="localhost:3306";
$dbName="almox";
$userName="root";
$pass="78541200";
$pdo = new PDO( 'mysql:host=' . $host . ' ;dbname=' . $dbName, $userName, $pass );
$pdo->exec("set names utf8");


$dataLocal = date("d/M/Y");

$email = "backupnova@starhealth.com.br, diretoria@novaemergencias.com.br, dir.operacional@novaemergencias.com.br,enfermagem@novaemergencias.com.br";
$tick=" <img style='width: 30px; height: 30px;' src='http://starhealth.com.br/checknova/assets/img/tickPositivo.jpeg' alt=' OK'>";
$tickNegativo="<img style='width: 30px; height: 30px;' src='http://starhealth.com.br/checknova/assets/img/falta.jpeg' alt='em Falta'>";
$setaAcima="<img style='width: 30px; height: 30px;' src='https://starhealth.com.br/checknova/assets/img/setacima.png' alt='Item Sobrando'>";
$setaBaixo="<img style='width: 30px; height: 30px;' src='https://starhealth.com.br/checknova/assets/img/setabaixo.png' alt='Item Faltando'>";


/*
foreach ($_POST as $key => $value) {
    echo $key . " - ". $value."<br>";
}    

echo "<br><hr><br>";
        foreach ($novo as $key => $value) {
            echo($key . " - ". $dicionario[$key]."<br>");
        }
  
    foreach ($_POST as $key => $value) {
        echo($dicionario[$key]." - ".$key."<br>");
    }
   */

//Função para gerar numero de ordem
function salvarOrdem($nOrden){
    $dataN = date("mY");
        
            
        /**
            * na primeira vez monta os arquivos no servido e monta os txt se necessário
            */
            $arquivoData = fopen('salvaData.txt','r');
            if ($arquivoData == false){
                $arquivoData = fopen('salvaData.txt','w+');
                fwrite($arquivoData, $dataN);
                }else{

            $linhaData= fgets($arquivoData);
        
                    } 

            $arquivo = fopen('ordem.txt','r');
            if ($arquivo == false) {
                $arquivo = fopen('ordem.txt','w+');
                $linha=1;
                fwrite($arquivo, $linha);


            }else{
                $linha = fgets($arquivo);
                $arquivo = fopen('ordem.txt','w+');
                $linha=$linha+1;
                fwrite($arquivo, $linha);



            }
            /**
             * se a data atual foi diferente da data salva no txt salvaData o 
             * mesmo salva a nova data e coloca o contador novamente em 1
             */
            if ($linhaData == $dataN){
            }  else{
            
            $arquivoData = fopen('salvaData.txt','w+');
            fwrite($arquivoData, $dataN);
            $arquivoData = fopen('salvaData.txt','r');
            $linhaData= fgets($arquivoData);

            $arquivo = fopen('ordem.txt','w+');
            $linha=1;
            fwrite($arquivo, $linha);
            $arquivo = fopen('ordem.txt','r');
            $linha = fgets($arquivo);

        }
        





        //fecha os arquivos abertos
            fclose($arquivo);    
            fclose($arquivoData);
            
        //retorna com o numero de ordem
        return $linha."/".$linhaData;
}


function solicitarReposicao($identificacao,$faltas, $nOrden,$tipo,$dataLocal,$email){

    // monta o array de resposta
    //primeira mensagem do array
    $mensagem ="<html>
    <head>
        <meta charset='UTF-8'>
        <link rel='stylesheet' href='stilo.css'>
        <!-- Meta tags Obrigatórias -->
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

    </head>
    <body>
    <h3 class='text-center'>Solitação de Reposição da ".$tipo."</h3>
    <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
    <tr >
            <td colspan='2' '>Nome: ".$identificacao["enfermagem"]."</td>
            <td >Numero de ordem: ".$nOrden." </td>

    </tr>

    <tr>
        <td >Viatura: ".$identificacao["vtr"]." </td>
        <td >Lacre: ".$identificacao["lacre"]." </td>                      
        <td> ". $identificacao["plantao"]."</td>
    </tr>

    ";
    //segunda mensagem do array
    $resposta = array($mensagem);

    foreach ($faltas as $key => $value) {
            $inserir= "<tr><td colspan='3'>".$value."</td></tr>";
            array_push($resposta,$inserir);

    }
    //finaliza a mensagem
    $inserir2="</table></body></html>";
    array_push($resposta,$inserir2);
    ;

    foreach ($resposta as $key => $value) {

        $mensa =$mensa.$value; 


    }

        //echo($mensa);
        $to = $email;
            //Assunto do email
        $subject= "Reposição da ".$tipo." - " .$dataLocal." - " .$identificacao["enfermagem"];

            //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
            //falta no checklist
            //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            //Variavel que recebe o envio do email
            $sucess = mail ($to , $subject ,  $mensa , $headers);
            //Verifica se o email foi mandado com sucesso 
            if(!$sucess) {
                echo 'Não foi possível enviar a mensagem.<br>';
                $errorMessage = error_get_last()['message'];
                echo $errorMessage;


            } else {
            //email enviado com sucesso alert JS
                echo "<script>alert('Reposição enviada com Sucesso')</script>";
            // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

            } 
            //Documento HTML que exibe os itens que precisam ser reposto


        return $resposta;
}


if($_POST["condutorInicio"]==1){
    

    //Recebe todos os itens do checklist, os itens faltantes ele seta como NULL ou Zero
  
    $novo = array(
        "nome" => $_POST['nome'],
        "controle"=>$_POST['controle'],
        "vtr"=>$_POST['vtr'],
        "base"=>$_POST['base'],
        "plantao"=>$_POST['plantao'],
        "oleo"=>$_POST['oleo'],
        "pneu"=>$_POST['pneu'],
        "radiador"=>$_POST['radiador'],
        "freio"=>$_POST['freio'],
        "painel"=>$_POST['painel'],
        "retrovisor"=>$_POST['retrovisor'],
        "vidors"=>$_POST['vidors'],
        "lanterna"=>$_POST['lanterna'],
        "faraol"=>$_POST['faraol'],
        "setas"=>$_POST['setas'],
        "capo"=>$_POST['capo'],
        "parachoque"=>$_POST['parachoque'],
        "lata_d"=>$_POST['lata_d'],
        "estribo"=>$_POST['estribo'],
        "lata_e"=>$_POST['lata_e'],
        "lata_T"=>$_POST['lata_T'],
        "parachoqueT"=>$_POST['parachoqueT'],
        "obsLata"=>$_POST['obsLata'],
        "giroflex"=>$_POST['giroflex'],
        "sirene"=>$_POST['sirene'],
        "luzeE"=>$_POST['luzeE'],
        "frontal"=>$_POST['frontal'],
        "Laterais"=>$_POST['Laterais'],
        "obs"=>$_POST['obs'],
        "limpezaInt"=>$_POST['limpezaInt'],
        "abast2"=>$_POST['abast2'],
        "km"=>$_POST['km'],
        "limpezaExt"=>$_POST['limpezaExt'],
        "bo2" =>$_POST['bo2'],
        "chave"=>$_POST['chave'],
        "flux"=>$_POST['flux'],
        "mano"=>$_POST['mano'],
        "hidra"=>$_POST['hidra'],
        "arCond"=>$_POST['arCond'],
        "exaust"=>$_POST['exaust'],
        "luzRe"=>$_POST['luzRe']


        );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array(
                "controle"=>"Controle do Portão",
                "oleo"=>"Oleo do Motor",
                "pneu"=>"Calibrar Pneu",
                "radiador"=>"Água do Radiador",
                "freio"=>"Freios",
                "painel"=>"Painel Luminoso",
                "retrovisor"=>"Retrovisores",
                "vidors"=>"Vidros",
                "lanterna"=>"Lanternas",
                "faraol"=>"Farois",
                "setas"=>"Setas",
                "capo"=>"Capo",
                "parachoque"=>"Parachoque Dianteiro",
                "lata_d"=>"Lateral Direita",
                "estribo"=>"Estribo",
                "lata_e"=>"Lateral Esquerda",
                "lata_T"=>"Portas Traseiras",
                "parachoqueT"=>"Parachoque Traseiro",
                "giroflex"=>"Giroflex",
                "sirene"=>"Sirene",
                "luzeE"=>"Luzes Embarque",
                "frontal"=>"Estrobo",
                "Laterais"=>"Luzes Laterais"
                
                
                
                );
    //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();

    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
    foreach ($novo as $key => $value) {
        if($value == NULL || $value == '0'){
        $novo[$key] = "Danificado";
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "ok"){
                $novo[$key]= "OK";
                        }
    }
    $sql= "INSERT INTO `tb_condutor_inicio` ( `nm_condutor`, `nm_vtr`, `KM`, `contole_portao`,
    `abastecimento`, `plantao`, `nivel_oleo`, `radiador`, `freios`, `hidraulico`, `retrovisor`,
     `vidros`, `capo`, `parachoque_frente`, `lateral_direita`, `estribo_direito`, `lateral_esq`, 
     `porta_tras`, `parachoque_tras`, `obs_lata`, `painel`, `lanterna`, `setas`, `luz_re`, `giroflex`,
      `sirene`, `luz_embarque`, `luz_frontal`, `ar_cond`, `exaustores`, `documento`, `extintor`,
       `calibragem_pneus`, `estepe`, `cintos_seg`, `botton`, `chave_boca`, `fluxomento`, `manometro`,
        `obs_gerais`, `limp_interna`, `limp_externa`, `data`) 
        VALUES ('$novo[nome]', '$novo[vtr]', '$novo[km]', '$novo[controle]', '$novo[abast2]',
         '$novo[plantao]', '$novo[oleo]', '$novo[radiador]', '$novo[freio]', '$novo[hidra]', 
         '$novo[retrovisor]', '$novo[vidors]', '$novo[capo]', '$novo[parachoque]', '$novo[lata_d]',
          '$novo[estribo]', '$novo[lata_e]', '$novo[lata_T]', '$novo[parachoque_T]', '$novo[obsLata]',
           '$novo[painel]',  '$novo[lanterna]', '$novo[setas]', '$novo[luzRe]', '$novo[giroflex]',
            '$novo[sirene]', '$novo[luzeE]', '$novo[frontal]', '$novo[arCond]', '$novo[exaust]',
             '$novo[docVTR]', '$novo[extInc]', '$novo[pneu]', '$novo[estepe]', '$novo[cintosSeg]',
              '$novo[botton]', '$novo[chave]', '$novo[flux]', '$novo[mano]', '$novo[obs]',
               '$novo[limpezaInt]', '$novo[limpezaExt]', CURRENT_TIMESTAMP)";
   
   $stmt = $pdo->prepare($sql);
   $result=$stmt->execute();
   if (!$result) {
     var_dump($stmt->errorInfo());

   }
   $count = $stmt->rowCount();
   $pdo= null;

   foreach ($novo as $key => $value) {
    if($value == NULL || $value == 'Danificado'){
    $novo[$key] = "Danificado ".$tickNegativo ;
    foreach ($dicionario as $chave => $valor) {
        if($chave == $key){
            array_push($faltantes, $valor);
            break;
        }
    }
        }else if($value == "OK"){
            $novo[$key]= "OK ".$tick;
                    }
    }
   

   //configura as imagens
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Condutor: " .$dataLocal." - " .$_POST['nome'];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>

                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Viatura</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='3' '>Nome: ".$novo["nome"]."</td>
                        </tr>

                        <tr>
                            <td >Viatura: ".$novo["vtr"]." </td>
                            <td >Odometro: ".$novo["km"]." </td>                      
                            <td>Plantão: ". $novo["plantao"]."</td>
                        </tr>
                        <tr>
                        <td colspan='3'>Abastecimento: ".$novo["abast2"]."</td>
                    </tr>
                        <tr><th class='text-center'colspan='3'>Mecanica</th></tr>
                        <tr>
                            <td>Oleo de Motor: ".$novo["oleo"]." </td>
                            <td>Radiador: ".$novo["radiador"]." </td>
                            <td>Sistema de Freios: ".$novo["freio"]." </td>

                        </tr>
                        <tr>
                        <td>Sistema Hidráulico: ".$novo["hidra"]." </td>
                        
                    </tr>
                    
                    </tr>
                    <tr><th class='text-center' colspan='3'>Funilária</th></tr>
                    <tr>
                        <td>Retrovisores ".$novo["retrovisor"]." </td>
                        <td>Vidros: ".$novo["vidors"]." </td>               
                        <td>Capo: ".$novo["capo"]." </td>
                        </tr>
                        <tr>
                        <td>Parachoque Frontal ".$novo["parachoque"]." </td>
                        <td>Lataria Direito: ".$novo["lata_d"]." </td>
                        <td>Estribo Direito: ".$novo["estribo"]." </td>
                        </tr>
                        <tr>
                        <td>Lataria Esquerda ".$novo["lata_e"]." </td>
                        <td>Portas Traseira: ".$novo["lata_T"]." </td>
                        <td>Parachoque Traseiro: ".$novo["parachoqueT"]." </td>
                        </tr>
                        <tr>
                        <td colspan='3'><strong>Observação funilaria: </strong>".$novo["obsLata"]." </td></tr>
                        <tr><th   class='text-center' colspan='3'>Parte Eletrica</th></tr>
                        <tr>
                        <td>Giroflex: ".$novo["giroflex"]." </td>
                        <td>Sirene: ".$novo["sirene"]." </td>
                        <td>Luzes de Embarque: ".$novo["luzeE"]." </td>
                        </tr>
                        <tr>
                        <td>Farois ".$novo["faraol"]." </td>
                        <td>Lanternas: ".$novo["lanterna"]." </td>
                        <td>Setas: ".$novo["setas"]." </td>
                        </tr>
                        <tr>
                        <td>Estrobo: ".$novo["frontal"]." </td>
                        <td>Intermitentes Laterais: ".$novo["Laterais"]." </td>
                        <td>Luz de Ré: ".$novo["luzRe"]." </td>
                        </tr><tr>
                        <td>Instrumentos do Painel: ".$novo["painel"]." </td>
                        <td>Ar condicionado: ".$novo["arCond"]." </td>
                        <td>Exaustores: ".$novo["exaust"]." </td>
                        </tr>
                        <tr>
                        <td >limpeza Interna: ".$novo["limpezaInt"]." </td>
                        <td colspan='2'>limpeza Externa: ".$novo["limpezaExt"]." </td>
                        </tr>
                        <tr><th   class='text-center' colspan='3'>Armario de Oxigênio</th></tr>
                        <tr>
                        <td>Bau do O²: ".$novo["bo2"]." </td>
                        <td>Chave de Boca: ".$novo["chave"]." </td>
                        <td>Fluxometro: ".$novo["flux"]." </td>
                        </tr>
                        <tr>
                        <td>Controle do Portão: ".$novo["controle"]." </td>
                        <td colspan='2'>Manômetro: ".$novo["mano"]." </td>
                        </tr>
                        <tr>
                        <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obs"]." </td>
                        </tr>
                        </table>
                        </body>
                        </html>
    ";
    //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    //Variavel que recebe o envio do email
    $sucess = mail ($to , $subject ,  $message , $headers);
    echo $message;
    //Verifica se o email foi mandado com sucesso 
    if(!$sucess) {
        echo 'Não foi possível enviar a mensagem.<br>';
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;


    } else {
    //email enviado com sucesso alert JS
        echo "<script>alert('CheckList enviado com Sucesso')</script>";

      //  echo " location.href='http://samu192sv.000webhostapp.com/checkNova/checklist.php';";

    } 
    //Documento HTML que exibe os itens que precisam ser reposto
   


}else if($_POST["condutorfim"]==1){

    $sql="INSERT INTO `condutorfim` ( `nome_condutor`, `vtr`, `abastecimento`, `num_talao`,
     `qtd_litros`, `km_final`, `intercorrencia`, `observacoes`,`data`)
     VALUES ('$_POST[nome]', '$_POST[vtr]', '$_POST[abast2]', '$_POST[num_talao]', '$_POST[qtd_litros]',
      '$_POST[km_final]', '$_POST[intercorrencia]', '$_POST[obs]', CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);
   $result=$stmt->execute();
   if (!$result) {
     var_dump($stmt->errorInfo());

   }
   $count = $stmt->rowCount();
   $pdo= null;


    $to = $email;
    //Assunto do email
    $subject= "Checklist Condutor Fechamento: " .$dataLocal." - " .$_POST['nome'];
    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                        
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Viatura</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='3' '>Nome: ".$_POST["nome"]."</td>
                        </tr>
    
                        <tr>
                            <td >Viatura: ".$_POST["vtr"]." </td>
                            <td >Odometro Final: ".$_POST["km_final"]." </td>                      
                            <td>".$_POST["base"]."</td>
                        </tr>
                        <tr>
                        <td >Abastecimento: ".$_POST["abast2"]."</td>
                        <td >Quantidade de Litros: ".$_POST["qtd_litros"]."</td>
                        <td >Numero talão Posto: ".$_POST["num_talao"]."</td>
                        
                    </tr>
                       
                        <tr>
                        <td colspan='2'>Observações Gerais: ".$_POST["obs"]." </td>
                        <td >Houve Intercorrências ".$_POST["intercorrencia"]." </td>
                        </tr>
                        </table>
                        </body>
                        </html>
    ";
    //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    //Variavel que recebe o envio do email
    $sucess = mail ($to , $subject ,  $message , $headers);
    echo $message;
    //Verifica se o email foi mandado com sucesso 
    if(!$sucess) {
        echo 'Não foi possível enviar a mensagem.<br>';
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;
    
    
    } else {
    //email enviado com sucesso alert JS
        echo "<script>alert('CheckList enviado com Sucesso')</script>";

    
    } 
}else if($_POST["checklistbasica"]==1){
    
   
        //Recebe todos os itens do checklist, os itens faltantes ele seta como NULL ou Zero
        $novo = array(
            "enfermagem"=>$_POST["enfermagem"],
            "condutor"=>$_POST["condutor"],
            "vtr"=>$_POST["vtr"],
            "plantao"=>$_POST["plantao"],
            "ambuA"=>$_POST['ambuA'],
            "ambuPED"=>$_POST['ambuPED'],
            "ssvv"=>$_POST['ssvv'],  
            "cadeira"=>$_POST['cadeira'],
            "chave"=>$_POST['chave'],
            "fluxL"=>$_POST['fluxL'],
            "fluxR"=>$_POST['fluxR'],
            "aspi" =>$_POST['aspi'],
            "kitHig"=>$_POST['kitHig'],
            "ked" =>$_POST['ked'],
            "lona" =>$_POST['lona'],
            "neb" =>$_POST['neb'],
            "o2g" =>$_POST['cilindroGrande'],
            "o2gr" =>$_POST['o2gr'],
            "o2l" =>$_POST['o2l'],
            "o2lr" =>$_POST['o2lr'],
            "prancha" =>$_POST['prancha'],
            "headB" =>$_POST['headB'],
            "resp" =>$_POST['resp'],
            "umil" =>$_POST['umil'],
            "umir" =>$_POST['umir'],
            "limpezaInt" =>$_POST['limpezaInt'],            
            "manometro" =>$_POST['manometro'],
            "maca" =>$_POST['maca'],
            "obs"=>$_POST['obs']
            );


        //Dicionario transforma o nomes da variaveis em nomes normais
        $dicionario = array(
            
            

            "ambuA" =>"AMBU Adulto",
            "ambuPED" =>"AMBU Pediatrico",
            "ssvv" =>"Bolsa ssvv",
            "cadeira"=>"Cadeira de Rodas",
            "chave" =>"Chave de Boca",
            "fluxL"=>"Fluxometro LIFE",
            "fluxR"=>"Fluxometro REDE",
            "aspi" =>"Frasco de Aspiração",
            "kitHig"=>"Kit de Higienização",
            "ked" =>"KED",
            "lona" =>" Lona de Transporte",
            "neb" =>"Nebulizador",
            "o2g" =>"Cilindro Grande de O² ",
            "o2gr" =>"Cilindro Grande Reserva de O² ",
            "o2l" =>"Cilindro LIFE de O²",
            "o2lr" =>"Cilindro Life de O² Reserva",          
            "prancha"=>"Prancha Rigida",
            "headB" =>"Head Block",
            "resp" =>"Respirador",
            "umil" =>"Umidificador LIFE",
            "umir" =>"Umidificaro REDE",            
            "limpezaInt"=>"Limpeza Interna",
            "manometro" =>' Manometro',
            "maca" =>'Maca com Rodas'        
                    
                    );
        //array simples que armazena os itens faltantes ja passado pela logica de dicionario
        $faltantes =  array();
    
        /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
        Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
        do Array $dicionario, quando fo identica ele popula o array $faltantes
        */

        foreach ($novo as $key => $value) {
            if($value == NULL || $value == '0'){
            $novo[$key] = "em falta ";
            foreach ($dicionario as $chave => $valor) {
                if($chave == $key){
                    break;
                }
            }
                }else if($value == "OK"){
                    $novo[$key]= "OK";
                            }
        }


        $sql="
        INSERT INTO `checklistbasica` ( `enfermagem`, `condutor`, `vtr`, `plantao`, `ambuA`,
         `ambuPED`, `ssvv`, `cadeira`, `chave`, `fluxL`, `fluxR`, `aspi`, `kitHig`, `ked`, 
         `lona`, `prancha`, `headB`, `resp`, `umil`, `umir`, `limpezaInt`, `manometro`, `maca`,
          `obs`, `data`)
         VALUES ( '$novo[enfermagem]', '$novo[condutor]', '$novo[vtr]', '$novo[plantao]', 
         '$novo[ambuA]', '$novo[ambuPED]', '$novo[ssvv]', '$novo[cadeira]', '$novo[chave]', 
         '$novo[fluxL]', '$novo[fluxR]', '$novo[aspi]', '$novo[kitHig]', '$novo[ked]', '$novo[lona]',
          '$novo[prancha]', '$novo[headB]', '$novo[resp]', '$novo[umil]', '$novo[umir]',
           '$novo[limpezaInt]', '$novo[manometro]', '$novo[maca]', '$novo[obs]', CURRENT_TIMESTAMP)
        ";
       $stmt = $pdo->prepare($sql);
      $result=$stmt->execute();
      if (!$result) {
        var_dump($stmt->errorInfo());
   
      }
      $count = $stmt->rowCount();
      $pdo= null;
   
        
        foreach ($novo as $key => $value) {
            if($value == "em falta "){
            $novo[$key] = "em falta " . $tickNegativo;
            foreach ($dicionario as $chave => $valor) {
                if($chave == $key){
                    array_push($faltantes, $valor);
                    break;
                }
            }
                }else if($value == "OK"){
                    $novo[$key]= $tick;
                            }
        }

        if($faltantes!=NULL){
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Viatura Básica",$dataLocal,$email);
        }
        //email que será envia o checklist
        $to = $email;
        //Assunto do email
       $subject= "Checklist Equipe Básica: " .$dataLocal." - " .$_POST["enfermagem"];
    
        //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
        //falta no checklist
        $message="     <html>
                            <head>
                                <meta charset='UTF-8'>
                                <link rel='stylesheet' href='stilo.css'>

                                <!-- Meta tags Obrigatórias -->
                                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                                <!-- Bootstrap CSS -->
                                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                            </head>
                            <body>
                            <h3 class='text-center'>Checklist da Viatura Básica</h3>
                            <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                            <tr>
                                    <td colspan='3' '>Enfermagem: ".$novo["enfermagem"]."</td>
                            </tr>
                                 

                            <tr>
                                <td >Condutor: ".$novo["condutor"]." </td>                      
                                <td >Viatura: ".$novo["vtr"]." </td>
                                <td> Plantao:". $novo["plantao"]."- Numero para reposição: ".$nOrden."</td>
                            </tr>

                           
                            <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                            <tr>
                                <td>AMBU Adulto: ".$novo["ambuA"]." </td>
                                <td>AMBU pediatrico: ".$novo["ambuPED"]." </td>
                                <td>Cadeira de Rodas: ".$novo["cadeira"]." </td>
    
                            </tr>

                            <tr>
                                <td>Prancha Rigida .Tirante ".$novo["prancha"]." </td>
                                <td>KED: ".$novo["ked"]." </td>
                                <td>Head Block: ".$novo["headB"]." </td>
                            
                            </tr>

                            <tr>
                                <td>Chave de Boca: ".$novo["chave"]."</td>
                                <td>Bolsa ssvv: ".$novo["ssvv"]."</td>
                                <td>Kit de Higienização:".$novo["kitHig"]."</td>

                            </tr>

                            <tr>
                                <td>Lona de Transpor:".$novo["lona"]." </td>
                                <td>Nebulizador: ".$novo["neb"]." </td>
                            
                            </tr>
                        <tr><th   class='text-center' colspan='3'>Regua de Gases</th></tr>

                        <tr>
                            <td>Oxigênio Grande ".$novo["o2g"]." </td>
                            <td>Oxigênio Grande Reserva: ".$novo["o2gr"]." </td>
                            <td>Umidificador LIFE: ".$novo["umil"]." </td>
                        </tr>

                        <tr>
                            <td>Umidificador REDE : ".$novo["umir"]."</td>
                            <td> Oxigênio LIFE: ".$novo["o2l"]."</td>
                            <td>Oxigênio LIFE Reserva: ".$novo["o2lr"]." </td>
                        </tr>

                        <tr>
                            <td>Frasco de Aspiração ".$novo["aspi"]." </td>
                            <td>Fluxometro LIFE: ".$novo["fluxL"]." </td>
                            <td>Fluxometro REDE: ".$novo["fluxR"]." </td>
                        </tr>

                        
                            <tr>
                          
                            <tr>
                            <td  colspan='3'>limpeza Interna: ".$novo["limpezaInt"]." </td>
                            </tr>
                            <tr>
                            <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obs"]." </td>
                            </tr>
                            </table>
                            </body>
                            </html>
        ";
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //echo $message;
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
    
    
        } else {

        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
    
          //  echo "location.href='http://samu192sv.000webhostapp.com/checkNova/checklist.php';";

        } 
}else if ($_POST['mochilaAmarela']==1){
    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "aguaB"=>$_POST['aguaB'],
        "aAsp"=>$_POST['aAsp'], 
        "aMangaLonga"=>$_POST['aMangaLonga'],
        "bloodS"=>$_POST['bloodS'],
        "CN"=>$_POST['CN'],
        "Cloreto"=>$_POST['Cloreto'],
        "CompEs"=>$_POST['CompEs'],
        "Cguedel"=>$_POST['Cguedel'], 
        "glicose"=>$_POST['glicose'],
        "grav"=>$_POST['grav'],
        "KitParto"=>$_POST['KitParto'],
        "Kitq"=>$_POST['Kitq'],
        "Lido"=>$_POST['Lido'],
        "lE"=>$_POST['lE'],
        "MascI"=>$_POST['MascI'],
        "MascDesck"=>$_POST['MascDesck'],
        "Masc95"=>$_POST['Masc95'],
        "MascVenturi"=>$_POST['MascVenturi'],
        "Micro"=>$_POST['Micro'],
        "scalp23"=>$_POST['scalp23'],
        "scalp25"=>$_POST['scalp25'],
        "seringa10"=>$_POST['seringa10'],
        "seringa20"=>$_POST['seringa20'],
        "sA8"=>$_POST['sA8'],
        "sA10"=>$_POST['sA10'],
        "sA12"=>$_POST['sA12'],
        "sA14"=>$_POST['sA14'],
        "swab"=>$_POST['swab'],
        "sf09"=>$_POST['sf09'],
        "nasoGastrica10"=>$_POST['nasoGastrica10'],
        "nasoGastrica12"=>$_POST['nasoGastrica12'],
        "obs"=>$_POST['obs']
    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array(
        "aguaB"=>"Agua Bidestilada 10ml",
        "aAsp"=>"Agulha de aspiração 40x12", 
        "aMangaLonga"=>"Avental de Procedemento Manga Longa",
        "bloodS"=>"Blood Stop",
        "CN"=>"Cateter Nasal",
        "Cloreto"=>"Cloreto de Sodio 0,9% 10 ML", 
        "CALINF"=>"Cateter Mono Lumen Infantil 18GA",
        "Clore"=>"Clorexedine Aquosa 0,2% 100ML",
        "ColAbe"=>"Coletor de Urina Sistema Aberto",
        "colFech"=>"Coletor de Urina Sistema Fechado",
        "CompEs"=>"Compressa Gaze Esteril 7,5 CM",
        "glicose"=>"Glicose 50% 10ML",
        "KitParto"=>"Kit Parto 2019",
        "Kitq"=>"Kit Queimados e Eviscerados",
        "Lido"=>"Lidocaina Gel 2% 30 gr",
        "lE"=>"Luva Plastica Esteril Transparente",
        "MascDesck"=>"Mascara Descartavel",
        "Masc"=>"Mascara de inalação Adulto",
        "Masc95"=>"Mascara N95",
        "MascVenturi"=>"Mascara Venturi 50% Adulto",
        "Micro"=>"Micropore",
        "scalp23"=>"Scalp 23",
        "scalp25"=>"Scalp 25",
        "seringa10"=>"Seringa 10ML",
        "seringa20"=>"Seringa 20ML",
        "sA8"=>"Sonda de aspiração Nº08 Com Valvula",
        "sA10"=>"Sonda de aspiração Nº10 Com Valvula",
        "sA12"=>"Sonda de aspiração Nº12 Com Valvula",
        "sA14"=>"Sonda de aspiração Nº14 Com Valvula",
        "swab"=>"SWAB Alcool",
        "grav"=>"Equip Gravitacional (tutodrop)",
        "sf09"=>"Soro Fisiologica 0,9% 500ML",
        "Cguedel"=>"Canula de guedel",
        "nasoGastrica10"=>"Sonda Nasogastrica N°10",
        "nasoGastrica12"=>"Sonda Nasogastrica N°12",
        
       
         
    );

    
    //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();

    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
    foreach ($novo as $key => $value) {
        if($value == NULL || $value == '0'){
        $novo[$key] = "em falta ";
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "OK"){
                $novo[$key]= "OK";
                        }
    }


    $sql="
    INSERT INTO `mochilaAmarela` (`enfermagem`, `vtr`, `lacre`, `plantao`,`aguaB`,
     `aAsp`, `aMangaLonga`, `bloodS`, `CN`, `Cloreto`, `CompEs`, `Cguedel`, `glicose`, `grav`,
      `KitParto`, `Kitq`, `Lido`, `lE`, `MascI`, `MascDesck`, `Masc95`, `MascVenturi`, `Micro`, 
      `scalp23`, `scalp25`, `seringa10`, `seringa20`, `sA8`, `sA10`, `sA12`, `sA14`,`swab`, `sf09`,
       `nasoGastrica10`, `nasoGastrica12`, `obs`, `data`) VALUES 
       ( '$novo[enfermagem]', '$novo[vtr]', '$novo[lacre]', '$novo[plantao]', '$novo[aguaB]','$novo[aAsp]',
       '$novo[aMangaLonga]', '$novo[bloodS]', '$novo[CN]', '$novo[Cloreto]', '$novo[CompEs]', '$novo[Cguedel]',
       '$novo[glicose]', '$novo[grav]', '$novo[KitParto]', '$novo[Kitq]', '$novo[Lido]', '$novo[lE]', 
       '$novo[MascI]', '$novo[MascDesck]', '$novo[Masc95]', '$novo[MascVenturi]', '$novo[Micro]', '$novo[scalp23]',
       '$novo[scalp25]', '$novo[seringa10]', '$novo[seringa20]', '$novo[sA8]', '$novo[sA10]', '$novo[sA12]',
       '$novo[sA14]', '$novo[swab]', '$novo[sf09]', '$novo[nasoGastrica10]', '$novo[nasoGastrica12]'
       ,'$novo[obs]', CURRENT_TIMESTAMP)
    
    ";
   $stmt = $pdo->prepare($sql);
  $result=$stmt->execute();
  if (!$result) {
    var_dump($stmt->errorInfo());

  }
  $count = $stmt->rowCount();
  $pdo= null;

    
    foreach ($novo as $key => $value) {
        if($value == "em falta "){
        $novo[$key] = "em falta  ".$tickNegativo;
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "ok"){
                $novo[$key]= $tick;
                        }
    } 
    if($faltantes!=NULL){
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila Amarela",$dataLocal,$email);
    }
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Mochila Amarela: " .$dataLocal." - " .$novo["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila Amarela</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='3' '>Nome: ".$novo["enfermagem"]."</td>
                        </tr>

                        <tr>
                            <td >Viatura: ".$novo["vtr"]." </td>
                            <td >Lacre: ".$novo["lacre"]." - Numero para reposição: ".$nOrden." </td>                      
                            <td> ". $novo["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        <tr>
                            <td>Agua Bidestilada 10ml: ".$novo["aguaB"]." </td>
                            <td>Agulha de aspiração 40x12: ".$novo["aAsp"]." </td>
                            <td>Blood Stop: ".$novo["bloodS"]." </td>

                        </tr>
                        <tr>
                        <td>Cloreto de Sodio 0,9% 10 ML: ".$novo["Cloreto"]." </td>
                        <td>Avental de Procedemento Manga Longa: ".$novo["aMangaLonga"]." </td>
                        <td>Glicose 50% 10ML: ".$novo["glicose"]." </td>
                        
                    </tr>
                    <tr>
                        <td>Cateter Nasal: ".$novo["CN"]." </td>
                        <td>Micropore: ".$novo["Micro"]." </td>
                        <td>Equip Gravitacional (tutodrop): ".$novo["grav"]." </td>
                    </tr>
                        <tr>
                        <td>Clorexedine Aquosa 0,2% 100ML: ".$novo["Clore"]." </td>
                        <td>Coletor de Urina Sistema Aberto: ".$novo["ColAbe"]." </td>
                        <td>Coletor de Urina Sistema Fechado: ".$novo["colFech"]." </td>
                        </tr>
                        <tr>
                        <td>Compressa Gaze Esteril 7,5 CM: ".$novo["CompEs"]." </td>
                        <td>Fleet Enema: ".$novo["fEnema"]." </td>  
                        <td>Fralda Geriatrica G: ".$novo["fralda"]." </td> 
                        </tr>
                        <tr>
                        <td>Kit Parto 2019: ".$novo["KitParto"]." </td>
                        <td>Kit Queimados e Eviscerados: ".$novo["Kitq"]." </td>
                        <td>Luva Esteril 7,5: ".$novo["lE"]." </td>
                        </tr>
                        <tr>
                        <td>Lidocaina Gel 2% 30 gr:".$novo["Lido"]." </td>
                        <td>Mascara Venturi 50% Adulto: ".$novo["MascVenturi"]." </td>
                        <td>Mascara N95: ".$novo["Masc95"]." </td>
                        </tr>
                        <tr>
                        <td>Mascara Descartavel: ".$novo["MascDesck"]." </td>
                        <td>Mascara de inalação Adulto: ".$novo["Masc"]." </td>
                        <td>Mascara Descartavel: ".$novo["MascDesck"]." </td>
                        </tr>
                        <tr>
                        <td>Solução Glicerina 12% 500ML: ".$novo["glicerina"]." </td>
                        <td>Scalp 23: ".$novo["scalp23"]." </td>
                        <td>Scalp 25: ".$novo["scalp25"]." </td>
                        </tr> 
                        <tr>
                        <td>Seringa 10ML: ".$novo["seringa10"]." </td>
                        <td>Seringa 20ML: ".$novo["seringa20"]." </td>
                        <td>Sonda de aspiração Nº08 Com Valvula: ".$novo["sA8"]." </td>
                        </tr>  
                        <tr>
                        <td>Sonda de aspiração Nº10 Com Valvula: ".$novo["sA10"]." </td>
                        <td>Sonda de aspiração Nº12 Com Valvula: ".$novo["sA12"]." </td>
                        <td>Sonda de aspiração Nº14 Com Valvula: ".$novo["sA14"]." </td>
                        </tr>
                        <tr>
                        <td>SWAB Alcool: ".$novo["swab"]." </td>
                        <td>Canula de guedel: ".$novo["Cguedel"]." </td>
                        <td>Sonda Nasogastrica N°10 : ".$novo["nasoGastrica10"]." </td>
                        </tr>
                        <tr>
                        <td>Sonda Nasogastrica N°12: ".$novo["nasoGastrica12"]." </td>
                        <td>Soro Fisiologica 0,9% 500ML: ".$novo["sf09"]." </td>
                        <td>Sonda Nasogastrica N°16 : ".$novo["nasoGastrica16"]." </td>
                        </tr>
                       
                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$novo["obs"]."</td></tr>
                        
                        
                        
                        
                        </table>
                        </body>
                        </html>
    ";
   // echo $message;
    //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    //Variavel que recebe o envio do email
    $sucess = mail ($to , $subject ,  $message , $headers);
    //Verifica se o email foi mandado com sucesso 
    if(!$sucess) {
        echo 'Não foi possível enviar a mensagem.<br>';
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;


    } else {
    //email enviado com sucesso alert JS
        echo "<script>alert('CheckList enviado com Sucesso')</script>";
       // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

    } 
    //Documento HTML que exibe os itens que precisam ser reposto

  
}else if($_POST['mochilatrauma']==1){
    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "aCrepe"=>$_POST['aCrepe'],
        "aCrepe15"=>$_POST['aCrepe15'],
        "aCrepe20"=>$_POST['aCrepe20'],
        "bTriangular"=>$_POST['bTriangular'],
        "b22D"=>$_POST['b22D'], 
        "cAranha"=>$_POST['cAranha'],
        "cCervical3"=>$_POST['cCervical3'],
        "cCervicalg"=>$_POST['cCervicalg'],
        "cCervicalm"=>$_POST['cCervicalm'],
        "cCervicalp"=>$_POST['cCervicalp'],
        "cCervicalespuma"=>$_POST['cCervicalespuma'], 
        "CompAlg"=>$_POST['CompAlg'],
        "CompEs"=>$_POST['CompEs'],
        "Espatula"=>$_POST['Espatula'],
        "fita"=>$_POST['fita'],
        "head"=>$_POST['head'],
        "tirante"=>$_POST['tirante'],
        "luvas"=>$_POST['luvas'],
        "manta"=>$_POST['manta'],
        "sf"=>$_POST['sf'],
        "talagg"=>$_POST['talagg'],
        "talag"=>$_POST['talag'],
        "talaM"=>$_POST['talaM'],
        "talap"=>$_POST['talap'],
        "talapp"=>$_POST['talapp'],
        "tesoura"=>$_POST['tesoura'],
        "obs"=>$_POST['obs']
    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array( 
        "aCrepe"=>"Atadura de Crepe de 10 CM",
        "aCrepe15"=>"Atadura de Crepe de 15 CM",
        "aCrepe20"=>"Atadura de Crepe de 20 CM",
        "bTriangular"=>"Bandagem Triangular",
        "b22D"=>"Bisturi N°22 Descartavel",
        "cAranha"=>"Cinto Aranha p/ Prancha",
        "cCervical3"=>"Colar Cervical com 3 Regulagem",
        "cCervicalg"=>"Colar Cervical G",
        "cCervicalm"=>"Colar Cervical M", 
        "cCervicalp"=>"Colar Cervical P",
        "cCervicalespuma"=>"Colar Cervical de Espuma",
        "CompAlg"=>"Compressa Algodonada 10X15 Esteril",
        "CompEs"=>"Compressa Gaze Esteril 7,5 CM",
        "Espatula"=>"Espatula Descartavel",
        "fita"=>"Fita Crepe 19X50 CM", 
        "head"=>"Imobilizador Lateral de Cabeça",
        "tirante"=>"Kit Tirante (3 tirantes)",
        "luvas"=>"Luvas de Procedimento",
        "manta"=>"Manta aluminizada",
        "sf"=>"Soro Fisiologica 0,9% 500ML", 
        "talagg"=>"Tala Imobilização GG - Amarela",
        "talag"=>"Tala Imobilização G - Verde",
        "talaM" =>"Tala Imobilização M - Laranja",
        "talap" =>" Tala Imobilização P - Azul",
        "talapp"=>" Tala Imobilização PP - Rouxa",
        "tesoura"=>"Tesoura Ponta Romba"
    );

    
    //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();

    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
    foreach ($novo as $key => $value) {
        if($value == NULL || $value == '0'){
        $novo[$key] = "em falta ";
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "ok"){
                $novo[$key]= "ok";
                        }
    } 

    $sql="
    INSERT INTO `mochilatrauma` ( `enfermagem`, `vtr`, `lacre`, `plantao`, `aCrepe`, `aCrepe15`,
    `aCrepe20`, `bTriangular`, `b22D`, `cAranha`, `cCervical3`, `cCervicalg`, `cCervicalm`, `cCervicalp`, 
    `cCervicalespuma`, `CompAlg`, `CompEs`, `Espatula`, `fita`, `head`, `tirante`, `luvas`, `manta`, `sf`, 
    `talagg`, `talag`, `talaM`, `talap`, `talapp`, `tesoura`, `obs`, `data`) 
    VALUES ( ' $novo[enfermagem]', '$novo[vtr]', '$novo[lacre]', '$novo[plantao]', '$novo[aCrepe]', 
    '$novo[aCrepe15]', '$novo[aCrepe20]', '$novo[bTriangular]', '$novo[b22D]', '$novo[cAranha]', '$novo[cCervical3]', 
    '$novo[cCervicalg]', '$novo[cCervicalm]', '$novo[cCervicalp]', '$novo[cCervicalespuma]', '$novo[CompAlg]', 
    '$novo[CompEs]', '$novo[Espatula]', '$novo[fita]', '$novo[head]', '$novo[tirante]', '$novo[luvas]', 
    '$novo[manta]', '$novo[sf]', ' $novo[talagg]', '$novo[talag]', '$novo[talaM]', '$novo[talap]', 
    '$novo[talapp]', '$novo[tesoura]', '$novo[obs]', CURRENT_TIMESTAMP)
    ";
    $stmt = $pdo->prepare($sql);
    $result=$stmt->execute();
    if (!$result) {
      var_dump($stmt->errorInfo());
  
    }
    $count = $stmt->rowCount();
    $pdo= null;

    foreach ($novo as $key => $value) {
        if($value ="em falta "){
        $novo[$key] = "em falta ".$tickNegativo;
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "ok"){
                $novo[$key]= $tick;
                        }
    } 
    if(($faltantes)!=NULL)  {
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila de Trauma",$dataLocal,$email);
    }
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Mochila de Trauma: " .$dataLocal." - " .$novo["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila de Trauma</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='3' '>Nome: ".$novo["enfermagem"]."</td>
                        </tr>

                        <tr>
                            <td >Viatura: ".$novo["vtr"]." </td>
                            <td >Lacre: ".$novo["lacre"]." - Numero para reposição: ".$nOrden." </td>                      
                            <td> ". $novo["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        <tr>
                            <td>Atadura de Crepe de 10 CM: ".$novo["aCrepe"]." </td>
                            <td>Atadura de Crepe de 15 CM: ".$novo["aCrepe15"]." </td>
                            <td>Atadura de Crepe de 20 CM: ".$novo["aCrepe20"]." </td>

                        </tr>
                        <tr>
                        <td>Cinto Aranha p/ Prancha: ".$novo["cAranha"]." </td>
                        <td>Bandagem Triangula: ".$novo["bTriangular"]." </td>
                        <td>Bisturi N°22 Descartavel: ".$novo["b22D"]." </td>
                        
                    </tr>
                    <tr>
                        <td>Colar Cervical G: ".$novo["cCervicalg"]." </td>
                        <td>Colar Cervical M: ".$novo["cCervicalm"]." </td>
                        <td>Colar Cervical P: ".$novo["cCervicalp"]." </td>
                    </tr>
                        <tr>
                        <td>Colar Cervical com 3 Regulagem: ".$novo["cCervical3"]." </td>
                        <td>Colar Cervical de Espuma: ".$novo["cCervicalespuma"]." </td>
                        <td>Compressa Algodonada 10X15 Esteril: ".$novo["CompAlg"]." </td>
                        </tr>
                        <tr>
                        <td>Compressa Gaze Esteril 7,5 CM: ".$novo["CompEs"]." </td>
                        <td>Espatula Descartavel: ".$novo["Espatula"]." </td>  
                        <td>Fita Crepe 19X50 CM: ".$novo["fita"]." </td> 
                        </tr>
                        <tr>
                        <td>Imobilizador Lateral de Cabeça: ".$novo["head"]." </td>
                        <td>Kit Tirante (3 tirantes): ".$novo["tirante"]." </td>
                        <td>Luvas de Procedimento: ".$novo["luvas"]." </td>
                        </tr>
                        <tr>
                        <td>Manta aluminizada:".$novo["manta"]." </td>
                        <td>Soro Fisiologica 0,9% 500ML: ".$novo["sf"]." </td>
                        <td>Tala Imobilização GG - Amarela: ".$novo["talagg"]." </td>
                        </tr>
                        <tr>
                        <td>Tala Imobilização G - Verde: ".$novo["talag"]." </td>
                        <td>Tala Imobilização M - Laranja: ".$novo["talaM"]." </td>
                        <td>Tala Imobilização P - Azul: ".$novo["talap"]." </td>
                        </tr>
                        <tr>
                        <td>Tala Imobilização PP - Rouxa: ".$novo["talapp"]." </td>
                        <td colspan='2'>Tesoura Ponta Romba: ".$novo["tesoura"]." </td>
                        </tr> 
                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$novo["obs"]."</td></tr>
                        </table>
                        </body>
                        </html>
    ";
    //    echo $message;
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;


        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
        // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

        } 
    //Documento HTML que exibe os itens que precisam ser reposto
  
}else if($_POST['fechamentobasica']==1){


    foreach ($_POST as $key => $value) {
        if($value == NULL || $value == '0'){
        $_POST[$key] = "Não Informado";
        }
    } 

    $sql="INSERT INTO `fechamentobasica` ( `enfermagem`, `vtr`, `dataPlantao`, `plantao`, 
    `lacreRompAmarela`, `lacreRompTrauma`, `matUsados`, `intercorrencia`, `obs`, `data`) 
    VALUES ('$_POST[enfermagem]', '$_POST[vtr]', '$_POST[dataPlantao]', '$_POST[plantao]', '$_POST[lacreRompAmarela]', 
    '$_POST[lacreRompTrauma]', '$_POST[vtr]', '$_POST[dataPlantao]', '$_POST[plantao]', CURRENT_TIMESTAMP)
    ";

    $stmt = $pdo->prepare($sql);
    $result=$stmt->execute();
    if (!$result) {
      var_dump($stmt->errorInfo());
  
    }
    $count = $stmt->rowCount();
    $pdo= null;
  
 
    $to = $email;
    //Assunto do email
    $subject= "Checklist Condutor Fechamento: " .$dataLocal." - " .$_POST['nome'];
    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                        
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                        </head>
                        <body>
                        <h3 class='text-center'>Checklist Fechamento do Plantão VTR Básica</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='3' '>Enfermagem: ".$_POST["enfermagem"]."</td>
                        </tr>
    
                        <tr>
                            <td >Viatura: ".$_POST["vtr"]." </td>
                            <td >Data do Plantão: ".date('d/m/Y', strtotime($_POST['dataPlantao']))." </td>                      
                            <td>Periodo".$_POST["plantao"]."</td>
                        </tr>
                        <tr>
                        <td >Lacre Rompido Amarela: ".$_POST["lacreRompAmarela"]."</td>
                        <td colspan='2'>Lacre Rompido Mochila de Trauma: ".$_POST["lacreRompTrauma"]."</td>
                        
                    </tr>
                        <tr>
                        <td colspan='3'>Materiais Usados: ".$_POST["matUsados"]." </td>
                        </tr>
                        <tr>
                        <td colspan='3'>Houve Intercorrências: ".$_POST["intercorrencia"]." </td>
                        </tr>
                        <tr>
                        <td colspan='3'>Observações Intercorrêcnia: ".$_POST["obs"]." </td>
                        </tr>
                        </table>
                        </body>
                        </html>
    ";
    //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    //Variavel que recebe o envio do email
    $sucess = mail ($to , $subject ,  $message , $headers);
    echo $message;
    //Verifica se o email foi mandado com sucesso 
    if(!$sucess) {
        echo 'Não foi possível enviar a mensagem.<br>';
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;

    } else {
    //email enviado com sucesso alert JS
        echo "<script>alert('CheckList enviado com Sucesso')</script>";
        echo "<script> document.location.href='https://starhealth.com.br/checknova/';</script>";

    }

}else if($_POST['checklistsav']==1){
 
   
        //Recebe todos os itens do checklist, os itens faltantes ele seta como NULL ou Zero
        $novo = array(
            "enfermagem"=>$_POST["enfermagem"],
            "condutor"=>$_POST["condutor"],
            "vtr"=>$_POST["vtr"],
            "plantao"=>$_POST["plantao"],
            "maca"=>$_POST["maca"],
            "mLona"=>$_POST["mLona"],
            "mangueira"=>$_POST["mangueira"],
            "cadeira"=>$_POST['cadeira'],
            "oximetro"=>$_POST['oximetro'],
            "term"=>$_POST['term'],
            "esfig"=>$_POST['esfig'],
            "esteto"=>$_POST['esteto'],
            "dextro"=>$_POST['dextro'],
            "otoscopio"=>$_POST['otoscopio'],
            "prancha" =>$_POST['prancha'],
            "mPrancha" =>$_POST['mPrancha'],
            "headB" =>$_POST['headB'],
            "tirantes" =>$_POST['tirantes'],
            "malaT" =>$_POST['malaT'],
            "malaRosa" =>$_POST['malaRosa'],
            "malaAzul" =>$_POST['malaAzul'],
            "malaVermelha" =>$_POST['malaVermelha'],
            "malaPsico" =>$_POST['malaPsico'],
            "malaVerde" =>$_POST['malaVerde'],
            "o2g" =>$_POST['o2g'],
            "o2g2" =>$_POST['o2g2'],
            "o2p" =>$_POST['o2p'],
            "umi" =>$_POST['umi'],
            "aspi" =>$_POST['aspi'],
            "flux" =>$_POST['flux'],
            "mano" =>$_POST['mano'],
            "respirador" =>$_POST['respirador'],
            'circAdulto'=>$_POST['circAdulto'],
            "circInf"=>$_POST['circInf'],
            "cardio"=>$_POST['cardio'],
            "cabom"=>$_POST['cabom'],
            "cabod"=>$_POST['cabod'],
            "desf"=>$_POST["desf"],
            "bomba"=>$_POST['bomba'],
            "limpezaInt" =>$_POST['limpezaInt'],
            "obs"=>$_POST['obs'],
            "kHig"=>$_POST['kHig'],
            "ambuA"=>$_POST['ambuA'],
            "ambuPed"=>$_POST['ambuPed'],
            "o2lr"=>$_POST['o2lr'],
            "boca"=>$_POST['boca'],
            "fonteResp"=>$_POST['fonteResp'],
            "bombaQTD"=>$_POST['bombaQTD'],
            "multi"=>$_POST['multi'],
            "cabo"=>$_POST['cabo'],
            "oba"=>$_POST['obs']        
            );


        //Dicionario transforma o nomes da variaveis em nomes normais
        $dicionario = array(
            
            "oximetro"=>'Oximetro',
            "term"=>'Termometro',
            "esfig"=>"Esfignomanometro",
            "esteto"=>"Estetoscopio",
            "dextro"=>"Dextro",
            "otoscopio"=>"Otoscopio",
            "mangueira"=>"Mangueira O²",
            "malaRosa" =>"Mochila Rosa",
            "malaAzul" =>"Mochila Azul",
            "malaVermelha" =>"Mochila Vermelha",
            "malaPsico" =>"Bolsa Psicotropico",
            "malaVerde" =>"Mochila Verde",
            "maca" =>"Maca de Lona",
            "mLona" =>"Maca de Lona",
            "cadeira"=>"Cadeira de Rodas",
            "prancha"=>"Prancha Rigida",
            "mPrancha" =>"Meia Prancha",
            "headB" =>"Head Block",
            "tirantes" =>"Tirante de fixação",
            "malaT" =>"Mochila de Trauma",
            "malaP" =>"Mochila de Procedimentos",
            "o2g" =>"O² Grande",
            "o2g2" =>"O² Grande",
            "o2p" =>"O² Portatil",
            "umi" =>"Umidificador",
            "aspi" =>"Frasco de Aspiração",
            "limpezaInt"=>"Limpeza Interna",
            "obs"=>"obs",
            "flux"=>"Fluxometro",
            "mano"=>"Manomentro",
            "respirador" =>"Respirador Mecânico de Transporte",
            "circAdulto"=>"Circuito de Ventilação Adulto",
            "circInf"=>"Circuito de Ventilação Infantil",
            "cardio"=>"Monitor de Transporte - Cardioversor",
            "cabom"=>"Cabo oximetria Monitorização (MULTI)",
            "cabod"=>"Cabo oximetria Monitorização (DESF)",
            "desf"=>"Desfribilador",
            "monitor"=>"Monitor + Cabo",
            "mangueira"=>"Mangueira O²",
            "bomba"=>"Bomba de Infusão",
            "kHig"=>'Kit de Higienização',
            "ambuA"=>'BVM Adulto',
            "ambuPed"=>'BVM Pediatrico',
            "o2lr"=>'O² Protatil Reserva',
            "boca"=>'Chave de Boca',
            "fonteResp"=>'Fonte de Alimentação Respirador',
            "multi"=>'Multiparametros'
                    
                    );
        //array simples que armazena os itens faltantes ja passado pela logica de dicionario
        $faltantes =  array();
    
        /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
        Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
        do Array $dicionario, quando fo identica ele popula o array $faltantes
        */
        foreach ($novo as $key => $value) {
            if($value == NULL || $value == '0'){
            $novo[$key] = "em falta " ;
            foreach ($dicionario as $chave => $valor) {
                if($chave == $key){
                    array_push($faltantes, $valor);
                    break;
                }
            }
                }else if($value == "ok"){
                    $novo[$key]= "ok";
                            }
        }
        $sql="       
        INSERT INTO `checklistsav` ( `enfermagem`, `condutor`, `vtr`, `plantao`, `maca`, 
        `mLona`, `mangueira`, `cadeira`, `oximetro`, `term`, `esfig`, `esteto`, `dextro`, `otoscopio`, 
        `prancha`, `mPrancha`, `headB`, `tirantes`, `malaT`, `malaRosa`, `malaAzul`, `malaVermelha`, 
        `malaPsico`, `malaVerde`, `o2g`, `o2g2`, `o2p`, `umi`, `aspi`, `flux`, `mano`, `respirador`, 
        `circAdulto`, `circInf`, `cardio`, `cabom`, `cabod`, `desf`, `bomba`, `limpezaInt`, `kHig`, `ambuA`,
         `ambuPed`, `o2lr`, `boca`, `fonteResp`, `bombaQTD`, `multi`, `cabo`, `obs`, `data`) 
         VALUES ( '$novo[enfermagem]', ' $novo[condutor]', '$novo[vtr]', '$novo[plantao]', '$novo[maca]', 
         '$novo[mLona]', '$novo[mangueira]', '$novo[cadeira]', '$novo[oximetro]', '$novo[term]', '$novo[esfig]',
         '$novo[esteto]', '$novo[dextro]', '$novo[otoscopio]', '$novo[prancha]', '$novo[mPrancha]', '$novo[headB]', 
         '$novo[tirantes]', '$novo[malaT]', '$novo[malaRosa]', '$novo[malaAzul]', '$novo[malaVermelha]',
         '$novo[malaPsico]', '$novo[malaVerde]', '$novo[o2g]', '$novo[o2g2]', '$novo[o2p]', '$novo[umi]', '$novo[aspi]',
         '$novo[flux]', '$novo[mano]', '$novo[respirador]', '$novo[circAdulto]', '$novo[circInf]', '$novo[cardio]',
         '$novo[cabom]', '$novo[cabod]', '$novo[desf]', '$novo[bomba]', '$novo[limpezaInt]', '$novo[kHig]', '$novo[ambuA]', 
         '$novo[ambuPed]', '$novo[o2lr]','$novo[boca]', '$novo[fonteResp]', '$novo[bombaQTD]', '$novo[multi]',
          '$novo[cabo]', '$novo[obs]', CURRENT_TIMESTAMP)
          ";

        $stmt = $pdo->prepare($sql);
        $result=$stmt->execute();
        if (!$result) {
          var_dump($stmt->errorInfo());
      
        }
        $count = $stmt->rowCount();
        $pdo= null;
      
        foreach ($novo as $key => $value) {
            if($value == "em falta "){
            $novo[$key] = "em falta " . $tickNegativo;
            foreach ($dicionario as $chave => $valor) {
                if($chave == $key){
                    array_push($faltantes, $valor);
                    break;
                }
            }
                }else if($value == "ok"){
                    $novo[$key]= $tick;
                            }
        }
        if($faltantes!=NULL){
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Viatura Avançada",$dataLocal,$email);
        }

        //email que será envia o checklist
        $to = $email;
        //Assunto do email
       $subject= "Checklist VTR Avançada: " .$dataLocal." - " .$_POST["enfermagem"];
    
        //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
        //falta no checklist
        $message="     <html>
                            <head>
                                <meta charset='UTF-8'>
                                <link rel='stylesheet' href='stilo.css'>

                                <!-- Meta tags Obrigatórias -->
                                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                                <!-- Bootstrap CSS -->
                                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                            </head>
                            <body>
                            <h3 class='text-center'>Checklist da Viatura Avançada</h3>
                            <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                            <tr>
                                    <td colspan='2' '>Enfermagem: ".$novo["enfermagem"]."</td>
                                    <td>N° Reposição: ".$nOrden."</td>
                            </tr>
                                 

                            <tr>
                                <td >Condutor: ".$novo["condutor"]." </td>                      
                                <td >Viatura: ".$novo["vtr"]." </td>
                                <td> ". $novo["plantao"]."</td>
                            </tr>

                           
                            <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                            <tr>
                                <td>Maca: ".$novo["maca"]." </td>
                                <td>Maca de Lona: ".$novo["mLona"]." </td>
                                <td>Cadeira de Rodas: ".$novo["cadeira"]." </td>
    
                            </tr>
                            <tr>
                            <td>Oximetro: ".$novo["oximetro"]." </td>
                            <td>Termometro: ".$novo["term"]." </td>
                            <td>Esfignomanometro: ".$novo["esfig"]." </td>
                            </tr>
                            <tr>
                            <td>Estetoscopio: ".$novo["esteto"]." </td>
                            <td>Dextro: ".$novo["dextro"]." </td>
                            <td>Otoscopio: ".$novo["otoscopio"]." </td>
                            </tr>
                            <tr>
                            <td>BVM Adulto: ".$novo["ambuA"]." </td>
                            <td>BVM Pediatrico: ".$novo["ambuPed"]." </td>
                            <td>Kit de Higienização: ".$novo["kHig"]." </td>
                            </tr>
                            
                            <tr>
                            <td>Prancha Rigida: ".$novo["prancha"]." </td>
                            <td>Meia Prancha: ".$novo["mPrancha"]." </td>
                            <td>Head Block: ".$novo["headB"]." </td>
                            </tr>
                            <tr>
                            <td>Kit Tirantes ".$novo["tirantes"]." </td>
                            <td>Mochila de Trauma: ".$novo["malaT"]." </td>
                            <td>Mochila Rosa: ".$novo["malaRosa"]." </td>
                            </tr>
                            <tr>
                            <td>Mangueira O²: ".$novo["mangueira"]." </td>
                            <td>Mochila Azul: ".$novo["malaAzul"]." </td>
                            <td>Mochila Vermelha: ".$novo["malaVermelha"]." </td>
                            </tr>
                            <tr>
                            <td colspan='2'>Bolsa Psicotropico: ".$novo["malaPsico"]." </td>
                            <td>Mochila Verde: ".$novo["malaVerde"]." </td>
                            </tr>
                        <tr><th   class='text-center' colspan='3'>Regua de Gases</th></tr>

                        <tr>
                        <td>Oxigênio Grande ".$novo["o2g"]." </td>
                        <td>Oxigênio Grande ".$novo["o2g2"]." </td>
                        <td>Oxigênio Portatil: ".$novo["o2p"]." </td>
                        </tr>

                        <tr>
                        <td>Oxigênio Portatil Reserva: ".$novo["o2lr"]." </td>

                        <td colspan='2'>Chave de Boca ".$novo["boca"]." </td>
                        </tr>
                            <tr>
                            <td>Umidificador: ".$novo["umi"]." </td>
                            <td>Frasco de Aspiração ".$novo["aspi"]." </td>
                            <td>Fluxometro: ".$novo["flux"]." </td>
                            </tr>
                            <tr>
                            <td colspan='3'>Manometro: ".$novo["mano"]." </td>
                            <tr>
                            <tr><th   class='text-center' colspan='3'>Equipamentos Médicos</th></tr>
                            <tr>
                            <td>Respirador Mecânico de Transporte: ".$novo["respirador"]." </td>
                            <td>Circuito de Ventilação Adulto ".$novo["circAdulto"]." </td>
                            <td>Circuito de Ventilação Infantil: ".$novo["circInf"]." </td>
                            </tr>
                            <td>Fonte de alimentação do respirador: ".$novo["fonteResp"]." </td>
                            <td>Monitor de Transporte - Cardioversor: ".$novo["cardio"]."</td>
                            <td>Monitor + Cabo ".$novo["cabod"]." </td>
                            </tr>
                           
                            <td>Desfribilador: ".$novo["desf"]."</td>
                            <td colspan='2'>Cabo + Fonte: ".$novo["cabo"]."</td>
                            </tr>

                            <tr>
                            <td>Multiparametros: ".$novo["multi"]."</td>
                            <td colspan='2'>Cabo oximetria Monitorização (MULTI): ".$novo["cabom"]."</td>
                            </tr>
                            <tr>
                            <td>Bomba de Infusão: ".$novo["bomba"]." </td>
                            <td colspan='2'>Quantida de Bombas de Infusao - Cardioversor: ".$novo["bombaQTD"]." </td>

                           </tr>
                            <td  colspan='3'>limpeza Interna: ".$novo["limpezaInt"]." </td>
                            </tr>
                            <tr>
                            <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obs"]." </td>
                            </tr>
                            </table>
                            </body>
                            </html>
        ";
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        echo $message;
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
    
    
        } else {

        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
    
          //  echo "location.href='http://samu192sv.000webhostapp.com/checkNova/checklist.php';";

        } 
}else if($_POST['mochilarosa']==1){

    $dataVencimento =  date('Y-m-d');

    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "obs"=>$_POST['obs'],
        "obs"=>$_POST['obsPsico']

    );

    $listaMed=[
        ["tipo"=>'Ampola',"Remedio"=>'Adenosina 6mg/2ml', "Qtd"=>$_POST['qtdAd'], "validade"=>$_POST['valAde'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Agua de Injeção 10 Ml', "Qtd"=>$_POST['qtdAinj'], "validade"=>$_POST['valAInj'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Aminofilina 24 MG', "Qtd"=>$_POST['qtdAmi'], "validade"=>$_POST['valAmi'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Amiodarona 50mg/ml', "Qtd"=>$_POST['qtdAmio'], "validade"=>$_POST['valAmio'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Atropina 0,25 mg', "Qtd"=>$_POST['qtdAtrop'], "validade"=>$_POST['valAtrop'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Buscopan Composto', "Qtd"=>$_POST['qtdBc'], "validade"=>$_POST['valBc'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Buscopan Simples', "Qtd"=>$_POST['qtdBcs'], "validade"=>$_POST['valBcs'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Cetoprofeno 100mg/2ml', "Qtd"=>$_POST['qtdCeto'], "validade"=>$_POST['valCeto'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Decadron 4mg/ml', "Qtd"=>$_POST['qtdDeca'], "validade"=>$_POST['valDeca'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Deslanosideo 0,2 mg', "Qtd"=>$_POST['qtdDesla'], "validade"=>$_POST['valDesla'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Dipirona 500mg / ml', "Qtd"=>$_POST['qtdDip'], "validade"=>$_POST['valDip'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Dobutamina 250mg/20Ml', "Qtd"=>$_POST['qtdDobu'], "validade"=>$_POST['valDobu'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Dopamina 5mg / ML', "Qtd"=>$_POST['qtdDopa'], "validade"=>$_POST['valDopa'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Dramim B6 IM', "Qtd"=>$_POST['qtdDraIM'], "validade"=>$_POST['valDramIM'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Dramim B6 Dl 10ML', "Qtd"=>$_POST['qtdDraDL'], "validade"=>$_POST['valDraDL'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Epinefrina 1mg/ml', "Qtd"=>$_POST['qtdEpi'], "validade"=>$_POST['valEpi'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Fenergam 25mg/ml', "Qtd"=>$_POST['qtdFene'], "validade"=>$_POST['valFene'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Furosemida 10mg/ml', "Qtd"=>$_POST['qtdFuro'], "validade"=>$_POST['valFuro'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Glicose 50% 10ml', "Qtd"=>$_POST['qtdGlico50'], "validade"=>$_POST['valGlico50'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Glicose 25% 10ml', "Qtd"=>$_POST['qtdGlico25'], "validade"=>$_POST['valGlico25'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Hidralasin 20mg/ml', "Qtd"=>$_POST['qtdHidra'], "validade"=>$_POST['valHidra'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Ondansetrona 4mg', "Qtd"=>$_POST['qtdOnda'], "validade"=>$_POST['valOnda'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Plasil 10mg/2ml', "Qtd"=>$_POST['qtdPla'], "validade"=>$_POST['valPla'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Ranitidina 25mg/ml', "Qtd"=>$_POST['qtdRani'], "validade"=>$_POST['valRani'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Soro Fisiologico 10ML', "Qtd"=>$_POST['qtdSF'], "validade"=>$_POST['valSF'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Seloken 1 mg/ml', "Qtd"=>$_POST['qtdSelo'], "validade"=>$_POST['valSelo'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Sulfato de Magnésio 10%', "Qtd"=>$_POST['qtdSM'], "validade"=>$_POST['valSM'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Suxametônio 100mg', "Qtd"=>$_POST['qtdSuxa'], "validade"=>$_POST['valSuxa'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Terbutalina 0,5mg/ml', "Qtd"=>$_POST['qtdTer'], "validade"=>$_POST['valTer'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Voltaren 75mg', "Qtd"=>$_POST['qtdVolt'], "validade"=>$_POST['valVolt'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Cloreto de Potassio 19%', "Qtd"=>$_POST['qtdColP'], "validade"=>$_POST['valColp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Ampola',"Remedio"=>'Cloreto de Sodio 20%', "Qtd"=>$_POST['qtdColS'], "validade"=>$_POST['valColS'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'ASS 100mg', "Qtd"=>$_POST['qtdASS'], "validade"=>$_POST['valASS'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Captopril 25mg', "Qtd"=>$_POST['qtCap'], "validade"=>$_POST['valClop'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Clopidogrel 75mg', "Qtd"=>$_POST['qtdClop'], "validade"=>$_POST['valClop'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Dipirona 500mg', "Qtd"=>$_POST['qtdDipCp'], "validade"=>$_POST['valDipCP'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Dorflex', "Qtd"=>$_POST['qtdDor'], "validade"=>$_POST['valDor'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Dramin B6 50mg', "Qtd"=>$_POST['qtdDraCp'], "validade"=>$_POST['valDraCp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Hidralazina 25mg', "Qtd"=>$_POST['qtdHidraCp'], "validade"=>$_POST['valHidraCp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Loratadina', "Qtd"=>$_POST['qtdLora'], "validade"=>$_POST['valLora'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Metildopa 250 mg', "Qtd"=>$_POST['qtdMetil'], "validade"=>$_POST['valMetil'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Polaramine', "Qtd"=>$_POST['qtdPol'], "validade"=>$_POST['valPol'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Propanolol 40mg', "Qtd"=>$_POST['qtdProp'], "validade"=>$_POST['valProp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Ranitidina 150mg', "Qtd"=>$_POST['qtdRaniCp'], "validade"=>$_POST['valRaniCp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Voltaren 500 mg', "Qtd"=>$_POST['qtdVoltCp'], "validade"=>$_POST['valVoltCp'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Isordil 0,5 mg', "Qtd"=>$_POST['qtdIso'], "validade"=>$_POST['valIso'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Comprimido',"Remedio"=>'Paracetamol', "Qtd"=>$_POST['qtdPara'], "validade"=>$_POST['valPara'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Atrovent', "Qtd"=>$_POST['qtdAtrov'], "validade"=>$_POST['valAtrov'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Buscopan Composto', "Qtd"=>$_POST['qtFBc'], "validade"=>$_POST['valLidoV'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Licodaina C/Vaso', "Qtd"=>$_POST['qtdLidoV'], "validade"=>$_POST['valLidoV'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Lidocaina S/Vaso', "Qtd"=>$_POST['qtdLido'], "validade"=>$_POST['valLido'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Dipirona 500mg - Comprimido', "Qtd"=>$_POST['qtdDipG'], "validade"=>$_POST['valDipG'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Dramim B6', "Qtd"=>$_POST['qtdDramG'], "validade"=>$_POST['valDramG'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Hidrocortizona 500mg', "Qtd"=>$_POST['qtdHidroc'], "validade"=>$_POST['valHidroc'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Omeprazol 40mg', "Qtd"=>$_POST['qtdOmeP'], "validade"=>$_POST['valOmeP'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Gel para ECG', "Qtd"=>$_POST['qtdGel'], "validade"=>$_POST['valGel'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Heparina Sodica 5.000 UI', "Qtd"=>$_POST['qtdHepSod'], "validade"=>$_POST['valHepSod'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Hidróxido de Aluminio', "Qtd"=>$_POST['qtdHidAl'], "validade"=>$_POST['valHidAl'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Frasco',"Remedio"=>'Clorexedina Aquosa 0,2%', "Qtd"=>$_POST['qtClore'], "validade"=>$_POST['valHidAl'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Amplictil', "Qtd"=>$_POST['qtdAmpl'], "validade"=>$_POST['valAmpl'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Cetamina', "Qtd"=>$_POST['qtdCeta'], "validade"=>$_POST['valCeta'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Clorpromatazina 25MG', "Qtd"=>$_POST['qtdClor'], "validade"=>$_POST['valClor'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Diazepam 10MG', "Qtd"=>$_POST['qtdDiaz'], "validade"=>$_POST['valDiaz'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Etomidato 2MG', "Qtd"=>$_POST['qtdEtomi'], "validade"=>$_POST['valEtomi'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Fenetoina Sódica', "Qtd"=>$_POST['qtdFene'], "validade"=>$_POST['valFene'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Fenobarbital', "Qtd"=>$_POST['qtdFenoB'], "validade"=>$_POST['valFenoB'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Fentanil', "Qtd"=>$_POST['qtdFenta'], "validade"=>$_POST['valFenta'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Flumazenil', "Qtd"=>$_POST['qtdFluma'], "validade"=>$_POST['valFluma'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Haloperidol', "Qtd"=>$_POST['qtdHalo'], "validade"=>$_POST['valHalo'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Midazolam 5MG', "Qtd"=>$_POST['qtdMida'], "validade"=>$_POST['valMida'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Morfina 0,2MG', "Qtd"=>$_POST['qtdMorf'], "validade"=>$_POST['valMorf'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Naloxona', "Qtd"=>$_POST['qtdNalo'], "validade"=>$_POST['valNalo'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Petidina 50MG', "Qtd"=>$_POST['qtdPeti'], "validade"=>$_POST['valPeti'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Tramal', "Qtd"=>$_POST['qtdTramal'], "validade"=>$_POST['valTramal'], "vencimento"=>NULL ,"alerta"=>NULL],
        ["tipo"=>'Psicotrotico',"Remedio"=>'Diazepam - Comprimido', "Qtd"=>$_POST['qtdDiazComp'], "validade"=>$_POST['valDiazComp'], "vencimento"=>NULL ,"alerta"=>NULL],
        
    ]; 

    foreach ($listaMed as $key => $value) {
        
        if($listaMed[$key]['vencimento'] == NULL){
    
            $diferenca = (strtotime($listaMed[$key]['validade'])) -(strtotime($dataVencimento));
            $dias = floor( $diferenca / 86400); 
            $listaMed[$key]['vencimento'] = $dias;
            $novaData = new DateTime($listaMed[$key]['validade']);
            $listaMed[$key]['validade']  = $novaData->format('d-m-Y');
    
           
        }
        if($dias< 1 ){
            $listaMed[$key][alerta] ="MEDICAMENTO VENCIDO HÁ ".($dias*-1)." DIAS";
            }elseif ($dias < 15) {
                $listaMed[$key][alerta]= "Menos de 15 dias para vencer";
                }elseif ($dias < 31 ) {
                $listaMed[$key][alerta] = "Menos de 1 meses para vencer"; 
                    }elseif ($dias < 61) {
                    $listaMed[$key][alerta]="Menos de 2 meses para vencer ";
                        }elseif ($dias < 91) {
                        $listaMed[$key][alerta] = "Menos de 3 meses para vencer"; 
                            }elseif ($dias < 181) {
                        $listaMed[$key][alerta] = "Menos de 6 meses para Vencer";
                            }else{
                    $listaMed[$key][alerta]= "Vencimento ok";
                }
       
       
    }

    $faltantes =  array();

    foreach ($listaMed as $key => $value) {
        if($listaMed[$key]['Qtd'] == NULL || $listaMed[$key]['Qtd'] ==  '0'){
            $listaMed[$key]['Qtd'] = "Em Falta";
            $listaMed[$key]['validade'] = "Não Informado"; 
            $listaMed[$key]['vencimento'] = "Não Informado"; 
            $listaMed[$key]['alerta'] = "Não Informado"; 
            array_push($faltantes, $listaMed[$key]['Remedio'] );
    
         }

    }

    if($faltantes!=NULL){
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Viatura Avançada",$dataLocal,$email);
        }

        // separa em variaveis para montar na mensagem
        foreach ($listaMed as $key => $value) {
            if($listaMed[$key]['tipo']=="Ampola")
        $teste1=$teste1. "
        <tr>
        <td>Medicação: ".$listaMed[$key]['Remedio']."</td>
        <td>Quantidade: ".$listaMed[$key]['Qtd']."</td>
        <td>Validade: ".$listaMed[$key]['alerta']."</td>
        </tr>
        ";
            
        }
        foreach ($listaMed as $key => $value) {
            if($listaMed[$key]['tipo']=="Comprimido")
        $comprimido=$comprimido. "
        <tr>
        <td>Medicação: ".$listaMed[$key]['Remedio']."</td>
        <td>Quantidade: ".$listaMed[$key]['Qtd']."</td>
        <td>Validade: ".$listaMed[$key]['alerta']."</td>
        </tr>
        ";
            
        }
        foreach ($listaMed as $key => $value) {
            if($listaMed[$key]['tipo']=="Frasco")
        $frasco=$frasco. "
        <tr>
        <td>Medicação: ".$listaMed[$key]['Remedio']."</td>
        <td>Quantidade: ".$listaMed[$key]['Qtd']."</td>
        <td>Validade: ".$listaMed[$key]['alerta']."</td>
        </tr>
        ";
            
        }
        foreach ($listaMed as $key => $value) {
            if($listaMed[$key]['tipo']=="Psicotrotico")
        $psico=$psico. "
        <tr>
        <td>Medicação: ".$listaMed[$key]['Remedio']."</td>
        <td>Quantidade: ".$listaMed[$key]['Qtd']."</td>
        <td>Validade: ".$listaMed[$key]['alerta']."</td>
        </tr>
        ";
            
        }

        //email que será envia o checklist
        $to = $email;
        //Assunto do email
       $subject= "Checklist Mochila Rosa: " .$dataLocal." - " .$_POST["enfermagem"];
    
        //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
        //falta no checklist
        $message="     <html>
                            <head>
                                <meta charset='UTF-8'>
                                <link rel='stylesheet' href='stilo.css'>

                                <!-- Meta tags Obrigatórias -->
                                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                                <!-- Bootstrap CSS -->
                                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                            </head>
                            <body>
                            <h3 class='text-center'>Checklist da Mochila Rosa</h3>
                            <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                            <tr>
                                    <td colspan='2' '>Enfermagem: ".$novo["enfermagem"]."</td>
                                    <td>N° Reposição: ".$nOrden."</td>
                            </tr><tr>
                                <td >Lacre: ".$novo['lacre']."</td>                      
                                <td >Viatura: ".$novo["vtr"]." </td>
                                <td> ". $novo["plantao"]."</td>
                            </tr>
                            <tr><th class='text-center'colspan='3'><h2>Ampolas</h2></th></tr>
                            <tr>
                            
                            </tr>
                            ".$teste1."
                           </tr>
                           <tr>
                           <tr><th class='text-center'colspan='3'><h2>Comprimidos</h2></th></tr>
                           </tr>".$comprimido."
                            <tr>
                            <tr><th class='text-center'colspan='3'><h2>Frasco</h2></th><hr   ></tr>
                            </tr>".$frasco."
                            <tr>
                            <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obs"]." </td>
                            </tr>
                            <tr>
                            <tr><th class='text-center'colspan='3'><h2>Psicotrópicos</h2></th><hr   ></tr>
                            </tr>".$psico."
                            <tr>  <tr>
                            <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obsPsico"]." </td>
                            </tr>
                            </table>
                            </body>
                            </html>
        ";
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        echo $message;
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
    
    
        } else {

        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
    
          //  echo "location.href='http://samu192sv.000webhostapp.com/checkNova/checklist.php';";

        } 
  
    
}elseif ($_POST['mochilapsico']==1){

    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
    );

    $droga= array( 
        "Amplicitil"=>$_POST['Amplicitil'],
        "Cetamina"=>$_POST['Cetamina'],
        "Clorpromatazina"=>$_POST['Clorpromatazina'],
        "Diazepam"=>$_POST['Diazepam'],
        "Etomidato"=>$_POST['Etomidato'],
        "Fenetoina" =>$_POST['Fenetoina'],
        "Fenobarbital" =>$_POST['Fenobarbital'],
        "Fentanil" =>$_POST['Fentanil'],
        "Flumazenil" =>$_POST['Flumazenil'],
        "Halopedirol" =>$_POST['Halopedirol'],
        "Midazolam" =>$_POST['Midazolam'],
        "Morfina" =>$_POST['Morfina'],
        "Naloxona" =>$_POST['Naloxona'],
        "Petidina" =>$_POST['Petidina'],
        "Tramal" =>$_POST['Tramal'],
        "DiazepamCP" =>$_POST['DiazepamCP'],
        "obs"=>$_POST['obs']
    );
    foreach ($novo as $key => $value) {
    # code...
    }
    

    
    //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();

    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
    foreach ($droga as $key => $value) {
        if($value == NULL || $value == '0'){
        $droga[$key] = "em falta ";
        
            }else if($value == "OK"){
                $droga[$key]= "OK";
                        }
    }

    $teste1;
    foreach ($droga as $key => $value) {
        $teste1 = $teste1."
        <tr ><td class='text-center' colspan='3'>".$key." : ".$value."</td></tr>";
    }

        //email que será envia o checklist
        $to = $email;
        //Assunto do email
       $subject= "Checklist Mochila Psicotropico: " .$dataLocal." - " .$_POST["enfermagem"];
    
        //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
        //falta no checklist
        $message="     <html>
                            <head>
                                <meta charset='UTF-8'>
                                <link rel='stylesheet' href='stilo.css'>

                                <!-- Meta tags Obrigatórias -->
                                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                                <!-- Bootstrap CSS -->
                                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    
                            </head>
                            <body>
                            <h3 class='text-center'>Checklist da Mochila Psicotropico</h3>
                            <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                            <tr>
                                    <td colspan='2' '>Enfermagem: ".$novo["enfermagem"]."</td>
                                    <td>N° Reposição: ".$nOrden."</td>
                            </tr><tr>
                                <td >Lacre: ".$novo['lacre']."</td>                      
                                <td >Viatura: ".$novo["vtr"]." </td>
                                <td> ". $novo["plantao"]."</td>
                            </tr>
                            <tr><th class='text-center'colspan='3'><h2>Psicotrópicos</h2></th></tr>
                            <tr>
                            ".$teste1."</tr>
                           <tr>
                            <td colspan='3'><strong>Observações Gerais:</strong> ".$novo["obs"]." </td>
                            </tr>
                            </table>
                            </body>
                            </html>
        ";
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        echo $message;
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
    
    
        } else {

        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
    
          //  echo "location.href='http://samu192sv.000webhostapp.com/checkNova/checklist.php';";

        } 
  
}elseif ($_POST['mochilaazul']==1) {


    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "bvmA" =>$_POST['bvmA'],
        "bvmPed" =>$_POST['bvmPed'],
        "cbLaringo" =>$_POST['cbLaringo'],
        "cadarco" =>$_POST['cadarco'],
        "cot65" =>$_POST['cot65'],
        "cot7" =>$_POST['cot7'],
        "cot75" =>$_POST['cot75'],
        "cot8" =>$_POST['cot8'],
        "cot85" =>$_POST['cot85'],
        "cot2s" =>$_POST['cot2s'],
        "cot25s" =>$_POST['cot25s'],
        "cot3s" =>$_POST['cot3s'],
        "cot4s" =>$_POST['cot4s'],
        "cot5s" =>$_POST['cot5s'],
        "guedel0" =>$_POST['guedel0'],
        "quedel1" =>$_POST['guedel1'],
        "guedel2" =>$_POST['guedel2'],
        "guedel3" =>$_POST['guedel3'],
        "guedel4" =>$_POST['guedel4'],
        "guedel5" =>$_POST['guedel5'],
        "catNasal" =>$_POST['catNasal'],
        "gaze" =>$_POST['gaze'],
        "nebulaA" =>$_POST['nebulaA'],
        "nebulaI" =>$_POST['nebulaI'],
        "fBact" =>$_POST['fBact'],
        "fio" =>$_POST['fio'],
        "crico" =>$_POST['crico'],
        "lc0" =>$_POST['lc0'],
        "lc1" =>$_POST['lc1'],
        "lc2" =>$_POST['lc2'],
        "lc3" =>$_POST['lc3'],
        "lc4" =>$_POST['lc4'],
        "lc5" =>$_POST['lc5'],
        "lido" =>$_POST['lido'],
        "luvasP" =>$_POST['luvasP'],
        "luva" =>$_POST['luva'],
        "luva8" =>$_POST['luva8'],
        "mascP" =>$_POST['mascp'],
        "mascA" =>$_POST['mascA'],
        "masD" =>$_POST['masD'],
        "masN95" =>$_POST['mascN95'],
        "mascL1" =>$_POST['mascL1'],
        "mascl15" =>$_POST['mascl15'],
        "mascL25" =>$_POST['mascL25'],
        "mascL3" =>$_POST['mascL3'],
        "mascL4" =>$_POST['mascL4'],
        "masL5" =>$_POST['mascL5'],
        "mascT" =>$_POST['mascT'],
        "mascTI" =>$_POST['mascTI'],
        "oculoProt" =>$_POST['oculoProt'],
        "maguil" =>$_POST['maguil'],
        "sering10" =>$_POST['seringa10'],
        "sonda6" =>$_POST['sonda6'],
        "sonda8" =>$_POST['sonda8'],
        "sonda10" =>$_POST['sonda10'],
        "sonda12" =>$_POST['sonda12'],
        "sonda14" =>$_POST['sonda14'],
        "obs"=>$_POST['obs']
    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array( 

        "bvmA" =>"BVM c/ Reservatório Adulto",
        "bvmPed" =>"BVM c/ Reservatório Pediatrico",
        "cbLaringo" =>"Cabo de Laringoscópio",
        "cadarco" =>"Cadarço Cordex - 1M",
        "cot65" =>"Canula Endotraqueal c/Cuff Nr° 6.5",
        "cot7" =>"Canula Endotraqueal c/Cuff Nr° 7",
        "cot75" =>"Canula Endotraqueal c/Cuff Nr° 7.5",
        "cot8" =>"Canula Endotraqueal c/Cuff Nr° 8",
        "cot85" =>"Canula Endotraqueal c/Cuff Nr° 8.5",
        "cot2s" =>"Canula Endotraqueal s/Cuff Nr° 2.0",
        "cot25s" =>"Canula Endotraqueal s/Cuff Nr° 2.5",
        "cot3s" =>"Canula Endotraqueal s/Cuff Nr° 3.0",
        "cot4s" =>"Canula Endotraqueal s/Cuff Nr° 4.0",
        "cot5s" =>"Canula Endotraqueal s/Cuff Nr° 5.0",
        "guedel0" =>"Canula de Guedel Nr° 0",
        "quedel1" =>"Canula de Guedel Nr° 1",
        "guedel2" =>"Canula de Guedel Nr° 2",
        "guedel3" =>"Canula de Guedel Nr° 3",
        "guedel4" =>"Canula de Guedel Nr° 4",
        "guedel5" =>"Canula de Guedel Nr° 5",
        "catNasal" =>"Cateter Nasal Tipo Oculos",
        "gaze" =>"Gaze Esteril 7,5CM",
        "nebulaA" =>"Conj. Nebulização Adulto",
        "nebulaI" =>"Conj. Nebulização Infantil",
        "fBact" =>"Filtro Bacteriano Circuito Respiratorio",
        "fio" =>"Fio Guia",
        "crico" =>"Kit Cricotiroidostomia - 2019",
        "lc0" =>"Lamina Curva Nr° 0",
        "lc1" =>"Lamina Curva Nr° 1",
        "lc2" =>"Lamina Curva Nr° 2",
        "lc3" =>"Lamina Curva Nr° 3",
        "lc4" =>"Lamina Curva Nr° 4",
        "lc5" =>"Lamina Curva Nr° 5",
        "lido" =>"Lidocaina Gel 2% 30 GR",
        "luvasP" =>"Luvas Plastica Esteril Transparente",
        "luva" =>"Luvas Esteril Nr° 7.5",
        "luva8" =>"Luva Esteril Nr° 8.5",
        "mascP" =>"Máscara com Reservatório Pediatrica - Alta Concentração",
        "mascA" =>"Máscara com Reservatório Adulta - Alta Concentração",
        "masD" =>"Mascara Descartavel",
        "masN95" =>"Mascara N95",
        "mascL1" =>"Mascara Laringea Nr° 1 (Até 5 Kilos)",
        "mascl15" =>"Mascara Laringea Nr° 1.5 (5 Kilos À 10 Kilos)",
        "mascL25" =>"Mascara Laringea Nr° 2.5(20 Kilos À 30 Kilos)",
        "mascL3" =>"Mascara Laringea Nr° 3 (30 Kilos À 50 Kilos)",
        "mascL4" =>"Mascara Laringea Nr° 4 (50 Kilos À 70 Kilos)",
        "masL5" =>"Mascara Laringea Nr° 5 (Acima de 70 Kilos)",
        "mascT" =>"Mascara Traqueia Adulto",
        "mascTI" =>"Mascara Traqueia Infantil",
        "oculoProt" =>"Oculos de Proteção",
        "maguil" =>"Pinça Maguill",
        "sering10" =>"Seringa Descartavel 10ML",
        "sonda6" =>"Sonda de Aspiração Nr° 6",
        "sonda8" =>"Sonda de Aspiração Nr° 8",
        "sonda10" =>"Sonda de Aspiração Nr° 10",
        "sonda12" =>"Sonda de Aspiração Nr° 12",
        "sonda14" =>"Sonda de Aspiração Nr° 14"
        
    );

    $qtdItens  = array(
        "bvmA" =>"1",
        "bvmPed" =>"1",
        "cbLaringo" =>"1",
        "cadarco" =>"1",
        "cot65" =>"1",
        "cot7" =>"1",
        "cot75" =>"1",
        "cot8" =>"1",
        "cot85" =>"1",
        "cot2s" =>"1",
        "cot25s" =>"1",
        "cot3s" =>"1",
        "cot4s" =>"1",
        "cot5s" =>"1",
        "guedel0" =>"1",
        "quedel1" =>"1",
        "guedel2" =>"1",
        "guedel3" =>"1",
        "guedel4" =>"1",
        "guedel5" =>"1",
        "catNasal" =>"3",
        "gaze" =>"3",
        "nebulaA" =>"3",
        "nebulaI" =>"2",
        "fBact" =>"1",
        "fio" =>"1",
        "crico" =>"1",
        "lc0" =>"1",
        "lc1" =>"1",
        "lc2" =>"1",
        "lc3" =>"1",
        "lc4" =>"1",
        "lc5" =>"1",
        "lido" =>"1",
        "luvasP" =>"3",
        "luva" =>"2",
        "luva8" =>"2",
        "mascP" =>"2",
        "mascA" =>"2",
        "masD" =>"3",
        "masN95" =>"3",
        "mascL1" =>"1",
        "mascl15" =>"1",
        "mascL25" =>"1",
        "mascL3" =>"1",
        "mascL4" =>"1",
        "masL5" =>"1",
        "mascT" =>"1",
        "mascTI" =>"1",
        "oculoProt" =>"2",
        "maguil" =>"1",
        "sering10" =>"1",
        "sonda6" =>"2",
        "sonda8" =>"2",
        "sonda10" =>"2",
        "sonda12" =>"2",
        "sonda14" =>"2"
    );

       //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();
    // armazena os itens em excesso;
    $excesso=array();
    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
    
    foreach ($novo as $key => $value) {
    if($value == NULL || $value == '0'){
    $novo[$key] = "em falta ";
    foreach ($dicionario as $chave => $valor) {
        if($chave == $key){
            array_push($faltantes, $valor);
            break;
        }
    }
        }else if($value == "OK"){
            $novo[$key]= "OK";
                    }
    }

    if(($faltantes)!=NULL)  {
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila Azul",$dataLocal,$email);
    }
   
  
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
    $subject= "Checklist Mochila Azul: " .$dataLocal." - " .$_POST["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila Azul</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='2' '>Nome: ".$_POST["enfermagem"]."</td>
                                <td> Numero para reposição: ".$nOrden."</td>
                                
                                </tr>

                        <tr>
                            <td >Viatura: ".$_POST["vtr"]." </td>
                            <td >Lacre: ".$_POST["lacre"]."  </td>                      
                            <td> ". $_POST["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        <tr> 
                        <td >BVM c/ Reservatório Adulto: ".$novo["bvmA"]." </td>
                            <td>BVM c/ Reservatório Pediatrico: ".$novo["bvmPed"]." </td>
                            <td>Cabo de Laringoscópio: ".$novo["cbLaringo"]." </td>

                        </tr>
                        <tr>
                        <td>Cadarço Cordex: ".$novo["cadarco"]." </td>
                        <td>Canula Endotraqueal c/Cuff Nr° 6.5: ".$novo["cot65"]." </td>
                        <td>Canula Endotraqueal c/Cuff Nr° 7: ".$novo["cot7"]." </td>
                    </tr>
                    <tr>
                        <td>Canula Endotraqueal c/Cuff Nr° 7.5 : ".$novo["cot75"]." </td>
                        <td>Canula Endotraqueal c/Cuff Nr° 8: ".$novo["cot8"]." </td>
                        <td>Canula Endotraqueal c/Cuff Nr° 8.5: ".$novo["cot85"]." </td>
                    </tr>
                        <tr>
                        <td> Canula Endotraqueal s/Cuff Nr° 2.0: ".$novo["cot2s"]." </td>
                        <td>Canula Endotraqueal s/Cuff Nr° 2.5: ".$novo["cot25s"]." </td>
                        <td>Canula Endotraqueal s/Cuff Nr° 3.0: ".$novo["cot3s"]." </td>
                         </tr>
                         <tr>
                         <td>Canula Endotraqueal s/Cuff Nr° 4.0: ".$novo["cot4s"]." </td>
                         <td>Canula Endotraqueal s/Cuff Nr° 5.0: ".$novo["cot5s"]." </td>
                         <td>Canula de Guedel Nr° 0: ".$novo["guedel0"]." </td>
                          </tr>
                        <tr>
                        <td>Canula de Guedel Nr° 1: ".$novo["quedel1"]." </td>
                        <td>Canula de Guedel Nr° 2: ".$novo["guedel2"]." </td>  
                        <td>Canula de Guedel Nr° 3: ".$novo["guedel3"]." </td> 
                        </tr>
                        <tr>
                        <td>Canula de Guedel Nr° 4: ".$novo["guedel4"]." </td>
                        <td>Canula de Guedel Nr° 5: ".$novo["guedel5"]." </td>
                        <td>Cateter Nasal Tipo Oculos: ".$novo["catNasal"]." </td>
                        </tr>
                        <tr>
                        <td>Gaze Esteril 7,5CM: ".$novo["gaze"]." </td>
                        <td>Conj. Nebulização Adulto: ".$novo["nebulaA"]." </td>
                        <td>Conj. Nebulização Infantil: ".$novo["nebulaI"]." </td>
                        </tr>
                        <tr>
                        <td>Filtro Bacteriano Circuito Respiratorio: ".$novo["fBact"]." </td>
                        <td>Fio Guia: ".$novo["fio"]." </td>
                        <td>Kit Cricotiroidostomia - 2019: ".$novo["crico"]." </td>
                        </tr> 
                        <tr> 
                        <td>Lamina Curva Nr° 0: ".$novo["lc0"]." </td>
                        <td>Lamina Curva Nr° 1: ".$novo["lc1"]." </td>
                        <td>Lamina Curva Nr° 2: ".$novo["lc2"]." </td>
                        </tr>
                        <tr>
                        <td>Lamina Curva Nr° 3: ".$novo["lc3"]." </td>
                        <td>Lamina Curva Nr° 4: ".$novo["lc4"]." </td>
                        <td>Lamina Curva Nr° 5: ".$novo["lc5"]." </td>
                        </tr>
                        <tr>
                        <td>Lidocaina Gel 2% 30 GR: ".$novo["lido"]." </td>
                        <td>Luvas Plastica Esteril Transparente: ".$novo["luvasP"]." </td>
                        <td>Luvas Esteril Nr° 7.5: ".$novo["luva"]." </td>
                        </tr>
                        <tr>
                        <td>Luva Esteril Nr° 8.5: ".$novo["luva8"]." </td>
                        <td>Máscara com Reservatório Pediatrica - Alta Concentração: ".$novo["mascP"]." </td>
                        <td>Máscara com Reservatório Adulta - Alta Concentração: ".$novo["mascA"]." </td>
                        </tr>
                        <tr>
                        <td>Mascara Descartavel: ".$novo["masD"]." </td>
                        <td>Mascara N95: ".$novo["masN95"]." </td>
                        <td>Mascara Laringea Nr° 1 (Até 5 Kilos): ".$novo["mascL1"]." </td>
                        </tr>
                        <tr>
                        <td>Mascara Laringea Nr° 1.5 (5 Kilos À 10 Kilos): ".$novo["mascl15"]." </td>
                        <td>Mascara Laringea Nr° 2.5(20 Kilos À 30 Kilos): ".$novo["mascL25"]." </td>
                        <td>Mascara Laringea Nr° 3 (30 Kilos À 50 Kilos): ".$novo["mascL3"]." </td>
                        </tr>
                        <tr>
                        <td>Mascara Laringea Nr° 4 (50 Kilos À 70 Kilos): ".$novo["mascL4"]." </td>
                        <td>Mascara Laringea Nr° 5 (Acima de 70 Kilos): ".$novo["masL5"]." </td>
                        <td>Mascara Traqueia Adulto: ".$novo["mascT"]." </td>
                        </tr>
                        <tr>
                        <td>Mascara Traqueia Infantil: ".$novo["mascTI"]." </td>
                        <td>Oculos de Proteção: ".$novo["oculoProt"]." </td>
                        <td>Pinça Maguill: ".$novo["maguil"]." </td>
                        </tr>
                        <tr>
                        <td>Seringa Descartavel 10ML: ".$novo["sering10"]." </td>
                        <td>Sonda de Aspiração Nr° 6: ".$novo["sonda6"]." </td>
                        <td>Sonda de Aspiração Nr° 8: ".$novo["sonda8"]." </td>
                        </tr> <tr>
                        <td>Sonda de Aspiração Nr° 10: ".$novo["sonda10"]." </td>
                        <td>Sonda de Aspiração Nr° 12: ".$novo["sonda12"]." </td>
                        <td>Sonda de Aspiração Nr° 14: ".$novo["sonda14"]." </td>
                        </tr>
                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$novo["obs"]."</td></tr>
                        </table>
                        </body>
                        </html>
             ";
         echo $message;
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;


        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
        // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

        }
}elseif ($_POST['mochilaverde']==1) {

    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "agulha" =>$_POST['agulha'],
        "campoFenestrado" =>$_POST['campoFenestrado'],
        "cateteradult" =>$_POST['cateteradult'],
        "cateterinfant" =>$_POST['cateterinfant'],
        "gaze" =>$_POST['gaze'],
        "clorex" =>$_POST['clorex'],
        "dreno" =>$_POST['dreno'],
        "esparadrapo" =>$_POST['esparadrapo'],
        "kitCir" =>$_POST['kitCir'],
        "kitSut" =>$_POST['kitSut'],
        "luva8" =>$_POST['luva8'],
        "luva8.5" =>$_POST['luva8.5'],
        "seringa" =>$_POST['seringa'],
        "sf10" =>$_POST['sf10'],
        "obs"=>$_POST['obs']
    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array( 
        
        "agulha" =>"Agulha de Aspiração 40X12",
        "campoFenestrado" =>"Campo fenestrado",
        "cateteradult" =>"Cateter Mono Lume Adulto 16GA",
        "cateterinfant" =>"Cateter Mono Lume infantil 18GA",
        "gaze" =>"Compressa de Gaze",
        "clorex" =>"Clorex Aquosa",
        "dreno" =>"Dreno de Torax Adulto",
        "esparadrapo" =>"Esparadrapo",
        "kitCir" =>"Kit peq. Cirurgia",
        "kitSut" =>"Kit Sutura",
        "luva8" =>"Luvas esteril 8,0",
        "luva8.5" =>"Luvas esteril 8,5",  
        "seringa" =>"Seringa de 20ML",
        "sf10"=>"Soro Fisiologico 0.9% 10ML"
    );

    
    //array simples que armazena os itens faltantes ja passado pela logica de dicionario
    $faltantes =  array();

    /*Organiza o Array novo e popula onde for NULL ou Zero ele subistitui com "Em Falta"
    Se aquele item esta "Em Falta" ele compara a $key de array $novo e compara com a $chave 
    do Array $dicionario, quando fo identica ele popula o array $faltantes
    */
   
    foreach ($novo as $key => $value) {
    if($value == NULL || $value == '0'){
    $novo[$key] = "em falta ";
    foreach ($dicionario as $chave => $valor) {
        if($chave == $key){
            array_push($faltantes, $valor);
            break;
        }
    }
        }else if($value == "OK"){
            $novo[$key]= "OK";
                    }
    }

    if(($faltantes)!=NULL)  {
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila Verde Escuro",$dataLocal,$email);
    }
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Mochila Verde Escuro: " .$dataLocal." - " .$novo["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila de Trauma</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='2' '>Nome: ".$novo["enfermagem"]."</td>
                                <td> Numero para reposição: ".$nOrden."</td>
                                
                                </tr>

                        <tr>
                            <td >Viatura: ".$novo["vtr"]." </td>
                            <td >Lacre: ".$novo["lacre"]."  </td>                      
                            <td> ". $novo["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        <tr>
                            <td>Agulha de Aspiração 40X12: ".$novo["agulha"]." </td>
                            <td>Campo fenestrado: ".$novo["campoFenestrado"]." </td>
                            <td>Cateter Mono Lume Adulto 16GA: ".$novo["cateteradult"]." </td>

                        </tr>
                        <tr>
                        <td>Cateter Mono Lume infantil 18GA: ".$novo["cateterinfant"]." </td>
                        <td>Compressa de Gaze : ".$novo["gaze"]." </td>
                        <td>Clorex Aquosa: ".$novo["clorex"]." </td>
                    </tr>
                    <tr>
                        <td>Soro Fisiológico 0.9% 10ML: ".$novo["sf10"]." </td>
                        <td>Esparadrapo: ".$novo["esparadrapo"]." </td>
                        <td>Dreno de Torax Adulto: ".$novo["dreno"]." </td>
                    </tr>
                        <tr>
                        <td>Luvas esteril 8,0: ".$novo["luva8"]." </td>
                        <td>Luvas esteril 8,5: ".$novo["luva8.5"]." </td>
                        </tr>
                        <tr>
                        <td>Kit peq. Cirurgia: ".$novo["kitCir"]." </td>
                        <td>Kit Sutura: ".$novo["kitSut"]." </td>  
                        <td>Seringa 20ML: ".$novo["seringa"]." </td> 
                        </tr>
                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$novo["obs"]."</td></tr>
                        </table>
                        </body>
                        </html>
    ";
         echo $message;
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;


        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
        // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

        } 

}elseif ($_POST['mochilavermelha']==1) {


    $novo = array(
        "enfermagem"=>$_POST['enfermagem'],
        "vtr"=>$_POST['vtr'],
        "lacre"=>$_POST['lacre'],
        "plantao"=>$_POST['plantao'],
        "gaze" =>$_POST['gaze'],
        "eletro" =>$_POST['eletro'],
        "equipoF" =>$_POST['equipoF'],
        "equipo" =>$_POST['equipo'],
        "macroG" =>$_POST['macroG'],
        "microG" =>$_POST['microG'],
        "espara" =>$_POST['espara'],
        "espatula" =>$_POST['espatula'],
        "lanterna" =>$_POST['lanterna'],
        "luva" =>$_POST['luva'],
        "manta" =>$_POST['manta'],
        "micropore" =>$_POST['micropore'],
        "polifix" =>$_POST['polifix'],
        "otoscopio" =>$_POST['otoscopio'],
        "poteC" =>$_POST['poteC'],
        "ringer" =>$_POST['ringer'],
        "sacoL" =>$_POST['sacoL'],
        "sf500" =>$_POST['sf500'],
        "sg500" =>$_POST['sg500'],
        "termometro" =>$_POST['termometro'],    
        "obs"=>$_POST['obs']
    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array( 
        
        "gaze" =>"Gaze III",
        "eletro" =>"Eletrodo Adulto",
        "equipoF" =>"Equipo de Bomba Fotosensivel ",
        "equipo" =>"Equipo de Bomba de Infusão",
        "macroG" =>"Equipo Macro Gotas",
        "microG" =>"Equipo Micro Gotas",
        "espara" =>"Esparadrapo",
        "espatula" =>"Espatula Descartavel",
        "luva" =>"Luvas de Procedimentos",
        "micropore" =>"Micropore",
        "lanterna" =>"Lanterna Clinica",
        "manta" =>"Manta Aluminizada",
        "micropore" =>"Micropore 25 X 10 CM",
        "polifix" =>"Polifix 2 Vias C/Clamp",
        "poteC" =>"Pote Coletor 50ML",
        "sacoL" =>"Saco Leitoso 15L",
        "otoscopio" =>"Otoscopio",
        "ringer" =>"Ringer Lactado 500 ML",
        "sf500" =>"Soro Fisiologico 0,9% 500 ML",
        "sg500" =>"Soro Glicosado 5% 500 ML",
        "termometro" =>"Termometro Clinico",
        
        
    );

    $faltantes = array(); 

     
    foreach ($novo as $key => $value) {
        if($value == NULL || $value == '0'){
        $novo[$key] = "em falta ";
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "OK"){
                $novo[$key]= "OK";
                        }
    
    } 

    if(($faltantes)!=NULL)  {
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila Vermelha",$dataLocal,$email);
    }

   
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Mochila Vermelha: " .$dataLocal." - " .$novo["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila Vermelha</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='2' '>Nome: ".$novo["enfermagem"]."</td>
                                <td> Numero para reposição: ".$nOrden."</td>
                                
                                </tr>

                        <tr>
                            <td >Viatura: ".$novo["vtr"]." </td>
                            <td >Lacre: ".$novo["lacre"]."  </td>                      
                            <td> ". $novo["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        
                        <tr>
                        <td>Micropore: ".$novo["micropore"]." </td>
                        <td>Eletrodo Adulto: ".$novo["eletro"]." </td>  
                        <td>Equipo de Bomba Fotosensivel: ".$novo["equipoF"]." </td> 
                        </tr>
                        <tr>
                        <td>Equipo de Bomba de Infusão: ".$novo["equipo"]." </td>
                        <td>Equipo Macro Gotas: ".$novo["macroG"]." </td>
                        <td>Equipo Micro Gotas: ".$novo["microG"]." </td>
                        </tr>
                        <tr>
                        <td>Gaze Esteril 7,5 CM: ".$novo["gaze"]." </td>
                        <td>Luvas de Procedimento: ".$novo["luva"]." </td>
                        <td>Polifix 2 Vias C/Clamp: ".$novo["polifix"]." </td>
                        </tr>
                        
                        <tr>
                        <td>Otoscopio: ".$novo["otoscopio"]." </td>
                        <td>Lanterna Clinica: ".$novo["lanterna"]." </td>
                        <td>Manta Aluminizada: ".$novo["manta"]." </td>
                        </tr>
                        <tr>
                        <td>Micropore 25 X 10 CM: ".$novo["micropore"]." </td>
                        <td>Esparadrapo: ".$novo["espara"]." </td>
                        <td>Espatula Descartavel: ".$novo["espatula"]." </td>
                        </tr>
                        
                       
                        <tr>
                        <td>Soro Fisiologico 0,9% 500 ML: ".$novo["sf500"]." </td>
                        <td>Pote Coletor 50ML: ".$novo["poteC"]." </td>
                        <td>Saco Leitoso 15L: ".$novo["sacoL"]." </td>
                        </tr>
                           
                        
                        <tr>
                        <td>Soro Glicosado 5% 500 ML: ".$novo["sg500"]." </td>
                        <td>Soro Ringer Lactado: ".$novo["ringer"]." </td>
                        <td>Termometro Clinico: ".$novo["termometro"]." </td>
                        </tr>

                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$novo["obs"]."</td></tr>
                        </table>
                        </body>
                        </html>
             ";
         echo $message;
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;


        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
        // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

        } 
}elseif ($_POST['fechamentoavancada']==1) {


    $novo  = array(
        "Trauma" =>$_POST['Trauma'],
        "obsTrauma" =>$_POST['obsTrauma'],
        "Rosa"=>$_POST['Rosa'],
        "obsRosa" =>$_POST['obsRosa'],
        "Azul" =>$_POST['Azul'],
        "obsAzul" =>$_POST['obsAzul'],
        "Vermelha"=>$_POST['Vermelha'],
        "obsVermelha" =>$_POST['obsVermelha'],
        "verde" => $_POST['verde'],
        "obsverde" =>$_POST['obsverde'],
        "psico" =>$_POST['psico'],
        "receita" =>$_POST['receita']
      );

      foreach ($novo as $key => $value) {

          if (($value == '0') || ($value == NULL)){
              $novo[$key] = "Não Informado ";
          }
      }
    $paciente = array();

    if($novo['receita']>0){
        foreach ($_POST as $key => $value) {
           if($key =="nome" ||$key =="vtr" ||$key =="plantao" ||$key =="lipeza2" ||
           $key =="fechamentoavancada" ||   $key =="Trauma" || $key =="obsTrauma" ||$key =="Rosa" ||
           $key =="obsRosa" ||$key =="Azul" ||$key =="obsAzul" ||
           $key =="Vermelha" ||$key =="obsVermelha" ||$key =="verde" ||
           $key =="obsverde" ||$key =="psico" ||$key =="receita" ||
           $key =="intercorrencia"||$key =="obs"){
            
           }else {
              array_push($paciente,$value); 
           }
        }
    }    
    $mostrarPaciente = NULL;
    for ($i=0; $i < sizeof($paciente) ; $i=$i+4) { 
        $mostrarPaciente = $mostrarPaciente."
        <tr>
            <td >Nome do Paciente:".$paciente[$i]."</td>
            <td>Numero do Receituário: ".$paciente[$i+1]."</td>
            <td>Nome do Médico: ".$paciente[$i+2]."</td>
            </tr>
            <tr><td colspan='3'>Medicação prescrita: ".$paciente[$i+3]."</td></tr><hr>
        ";
    }
    if($mostrarPaciente == NULL){
        $mostrarPaciente = " <tr><td colspan='3'>Não Informado</td></tr>";

    }
        $to = $email;
        //Assunto do email
        $subject= "Checklist Fechamento Vtr Avançada: " .$dataLocal." - " .$_POST['nome'];
        //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
        //falta no checklist
        $message="     <html>
                            <head>
                                <meta charset='UTF-8'>
                            
                                <!-- Meta tags Obrigatórias -->
                                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                                <!-- Bootstrap CSS -->
                                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
        
                            </head>
                            <body>
                            <h3 class='text-center'>Checklist de Fechamento Viatura Avançada</h3>
                            <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                            <tr >
                                    <td colspan='3' '>Nome: ".$_POST["nome"]."</td>
                            </tr>
        
                            <tr>
                                <td >Viatura: ".$_POST["vtr"]." </td>
                                <td >Plantão: ".$_POST["plantao"]."</td>                      
                                <td>Limpeza realizada: ".$_POST['lipeza2']."</td>
                                </tr>    
                            
                            <tr>
                            <th class='text-center' colspan='3'>Mochilas</th>
                            </tr>
                        <tr>
                        <td class='text-center' >Mochila Trauma lacre: ".$novo['Trauma']."</td>
                        <td colspan='2'>Observações: ".$novo['obsTrauma']."</td>
                        </tr>
                        <tr>
                        <td class='text-center' >Mochila Rosa lacre: ".$novo['Rosa']."</td>
                        <td colspan='2'>Observações: ".$novo['obsRosa']."</td>
                        </tr>
                        <tr>
                        <td class='text-center' >Mochila Azul lacre: ".$novo['Azul']."</td>
                        <td colspan='2'>Observações: ".$novo['obsAzul']."</td>
                        </tr>
                        <tr>
                        <td class='text-center' >Mochila Vermelha lacre: ".$novo['Vermelha']."</td>
                        <td colspan='2'>Observações: ".$novo['obsVermelha']."</td>
                        </tr>
                        <tr>
                        <td class='text-center' >Mochila Verde lacre: ".$novo['verde']."</td>
                        <td colspan='2'>Observações: ".$novo['obsverde']."</td>
                        </tr>
                        <tr>
                        <td class='text-center' >Mochila Psicotropico lacre: ".$novo['psico']."</td>
                        <td colspan='2'>Qtd Receitas: ".$novo['receita']."</td>
                        </tr>
                        <th colspan='3'>Psicotropicos Usados</th>".$mostrarPaciente."
                        <th colspan='3'>Observações Gerais</th>
                        <tr>
                        <td colspan='3' >Houve Intercorrências ".$_POST['intercorrencia']." </td>
                        </tr>
                            <tr>
                            <td colspan='3'>Observações Gerais: ".$_POST["obs"]." </td>
                            </tr>
                            </table>
                            </body>
                            </html>
        ";
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        echo $message;
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
        
        
        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso' )</script>";

        

            
        }

        $_POST=NULL;
}elseif ($_POST['mochilarosasimples']) {

   
    $novo = array(
        
        "Agua"=>$_POST['Agua'],
        "Adenosina"=>$_POST['Adenosina'],
        "Aminofilina"=>$_POST['Aminofilina'],
        "Amiodarona"=>$_POST['Amiodarona'],
        "Atropina"=>$_POST['Atropina'],
        "BuscopanComp"=>$_POST['BuscopanComp'],
        "BuscopanSimples"=>$_POST['BuscopanSimples'],
        "Cetoprofeno"=>$_POST['Cetoprofeno'],
        "Decadron"=>$_POST['Decadron'],
        "Deslanosideo"=>$_POST['Deslanosideo'],
        "Dipirona"=>$_POST['Dipirona'],
        "Dobutamina"=>$_POST['Dobutamina'],
        "Dopamina"=>$_POST['Dopamina'],
        "DramimIm"=>$_POST['DramimIm'],
        "DramimDl"=>$_POST['DramimDl'],
        "Epinefrina"=>$_POST['Epinefrina'],
        "Fenergam"=>$_POST['Fenergam'],
        "Furosemida"=>$_POST['Furosemida'],
        "Glicose50"=>$_POST['Glicose50'],
        "Glicose25"=>$_POST['Glicose25'],
        "Hidralasina"=>$_POST['Hidralasina'],
        "Ondansetrona"=>$_POST['Ondansetrona'],
        "Plasil"=>$_POST['Plasil'],
        "Ranitidina"=>$_POST['Ranitidina'],
        "SF10"=>$_POST['SF10'],
        "Seloken"=>$_POST['Seloken'],
        "MGSO4"=>$_POST['MGSO4'],
        "Suxametônio"=>$_POST['Suxametônio'],
        "Terbutalina"=>$_POST['Terbutalina'],
        "Voltaren"=>$_POST['Voltaren'],
        "KCL"=>$_POST['KCL'],
        "NACL"=>$_POST['NACL'],
        "ASS"=>$_POST['ASS'],
        "Captopril"=>$_POST['Captopril'],
        "Clopidogrel"=>$_POST['Clopidogrel'],
        "DipironaCp"=>$_POST['DipironaCp'],
        "Dorflex"=>$_POST['Dorflex'],
        "DraminCp"=>$_POST['DraminCp'],
        "Hidralazina"=>$_POST['Hidralazina'],
        "Loratadina"=>$_POST['Loratadina'],
        "Metildopa"=>$_POST['Metildopa'],
        "Polaramine"=>$_POST['Polaramine'],
        "Propanolol"=>$_POST['Propanolol'],
        "VoltarenCp"=>$_POST['VoltarenCp'],
        "Isordil"=>$_POST['Isordil'],
        "Paracetamol"=>$_POST['Paracetamol'],
        "Atrovent"=>$_POST['Atrovent'],
        "BuscopanGts"=>$_POST['BuscopanGts'],
        "Berotec"=>$_POST['Berotec'],
        "Clorexedina"=>$_POST['Clorexedina'],
        "LidoV"=>$_POST['LidoV'],
        "Lido"=>$_POST['Lido'],
        "DipG"=>$_POST['DipG'],
        "DramimGts"=>$_POST['DramimGts'],
        "Hidrocortizona"=>$_POST['Hidrocortizona'],
        "Omeprazol"=>$_POST['Omeprazol'],
        "GelECG"=>$_POST['GelECG'],
        "Heparina"=>$_POST['Heparina'],
        "Aluminio"=>$_POST['Aluminio'],
        "Amplicitil"=>$_POST['Amplicitil'],
        "Cetamina"=>$_POST['Cetamina'],
        "Clorpromatazina"=>$_POST['Clorpromatazina'],
        "Diazepam"=>$_POST['Diazepam'],
        "Etomidato"=>$_POST['Etomidato'],
        "Fenetoina" =>$_POST['Fenetoina'],
        "Fenobarbital" =>$_POST['Fenobarbital'],
        "Fentanil" =>$_POST['Fentanil'],
        "Flumazenil" =>$_POST['Flumazenil'],
        "Halopedirol" =>$_POST['Halopedirol'],
        "Midazolam" =>$_POST['Midazolam'],
        "Morfina" =>$_POST['Morfina'],
        "Naloxona" =>$_POST['Naloxona'],
        "Petidina" =>$_POST['Petidina'],
        "Tramal" =>$_POST['Tramal'],
        "DiazepamCP" =>$_POST['DiazepamCP'],


    );

    //Dicionario transforma o nomes da variaveis em nomes normais
    $dicionario = array( 
        
        "Agua"=>'Agua Destilada',
        "Adenosina"=>'Adenosina 6mg/2ml',
        "Aminofilina"=>'Aminofilina 24 MG',
        "Amiodarona"=>'Amiodarona 50mg/ml',
        "Atropina"=>'Atropina 0,25 mg',
        "BuscopanComp"=>'Buscopan Composto',
        "BuscopanSimples"=>'Buscopan Simples',
        "Cetoprofeno"=>'Cetoprofeno 100mg/2ml',
        "Decadron"=>'Decadron 4mg/ml',
        "Deslanosideo"=>'Deslanosideo 0,2 mg',
        "Dipirona"=>'Dipirona 500mg / ml',
        "Dobutamina"=>'Dobutamina 250mg/20Ml',
        "Dopamina"=>'Dopamina 5mg / ML',
        "DramimIm"=>'Dramim B6 IM',
        "DramimDl"=>'Dramim B6 Dl 10ML',
        "Epinefrina"=>'Epinefrina 1mg/ml',
        "Fenergam"=>'Fenergam 25mg/ml',
        "Furosemida"=>'Furosemida 10mg/ml',
        "Glicose50"=>'Glicose 50% 10ml',
        "Glicose25"=>'Glicose 25% 10ml',
        "Hidralasina"=>'Hidralasina 20mg/ml',
        "Ondansetrona"=>'Ondansetrona 4mg',
        "Plasil"=>'Plasil 10mg/2ml',
        "Ranitidina"=>'Ranitidina 25mg/ml',
        "SF10"=>'Soro Fisiologico 10ML',
        "Seloken"=>'Seloken 1 mg/ml',
        "MGSO4"=>'Sulfato de Magnésio 10%',
        "Suxametônio"=>'Suxametônio 100mg',
        "Terbutalina"=>'Terbutalina 0,5mg/ml',
        "Voltaren"=>'Voltaren 75mg',
        "KCL"=>'Cloreto de Potassio 19%',
        "NACL"=>'Cloreto de Sodio 20%',
        "ASS"=>'ASS 100mg',
        "Captopril"=>'Captopril 25 mg cp',
        "Clopidogrel"=>'Clopidogrel 75mg',
        "DipironaCp"=>'Dipirona 500mg Cp',
        "Dorflex"=>'Dorflex',
        "DraminCp"=>'Dramin B6 50mg Cp',
        "Hidralazina"=>'Hidralazina 25mg',
        "Loratadina"=>'Loratadina',
        "Metildopa"=>'Metildopa 250 mg',
        "Polaramine"=>'Polaramine 40mg',
        "Propanolol"=>'Propanolol',
        "VoltarenCp"=>'Voltaren 500 mg Cp',
        "Isordil"=>'Isordil 0,5 mg',
        "Paracetamol"=>'Paracetamol',
        "Atrovent"=>'Atrovent',
        "BuscopanGts"=>'Buscopan Composto Gotas',
        "Berotec"=>'Berotec',
        "Clorexedina"=>'Clorexedina Aguosa 0,2',
        "LidoV"=>'Licodaina C/Vaso',
        "Lido"=>'Licodaina S/Vaso',
        "DipG"=>'Dipirona 500mg Gts',
        "DramimGts"=>'Dramim B6 Gts',
        "Hidrocortizona"=>'Hidrocortizona 500mg',
        "Omeprazol"=>'Omeprazol 40mg',
        "GelECG"=>'Gel para ECG',
        "Heparina"=>'Heparina Sodica 5.000 UI',
        "Aluminio"=>'Hidróxido de Aluminio',
        "Amplicitil"=>'Amplicitil ',
        "Cetamina"=>'Cetamina',
        "Clorpromatazina"=>'Clorpromatazina 25 mg',
        "Diazepam"=>'Diazepam 10 mg',
        "Etomidato"=>'Etomidato 2MG',
        "Fenetoina" =>'Fenetoina 5 ML (hidantal)',
        "Fenobarbital" =>'Fenobarbital (Gardenal)',
        "Fentanil" =>'Fentanil',
        "Flumazenil" =>'Flumazenil',
        "Halopedirol" =>'Halopedirol',
        "Midazolam" =>'Midazolam 5MG',
        "Morfina" =>'Morfina 0,2MG',
        "Naloxona" =>'Naloxona',
        "Petidina" =>'Petidina 50MG',
        "Tramal" =>'Tramal',
        "DiazepamCP" =>'Diazepam - Comprimido',
    );

    $faltantes = array(); 

     
    foreach ($novo as $key => $value) {
        if($value == NULL || $value == '0'){
        $novo[$key] = "em falta ";
        foreach ($dicionario as $chave => $valor) {
            if($chave == $key){
                array_push($faltantes, $valor);
                break;
            }
        }
            }else if($value == "OK"){
                $novo[$key]= "OK";
                        }
    
    } 




    if(($faltantes)!=NULL)  {
        $nOrden= salvarOrdem($nOrden);
        $repor  = solicitarReposicao($novo,$faltantes,$nOrden,"Mochila Rosa Diária",$dataLocal,$email);
    }



    //falta o sql
    foreach ($novo as $key => $value) {
        if($value == "em falta "){
        $novo[$key] = "em falta  ".$tickNegativo;
       
            }else if($value == "OK"){
                $novo[$key]= $tick;
                        }
    }
   $corpo;
   foreach ($novo as $key => $value) {
     $corpo= $corpo."  <tr>
           <td class='text-center'colspan ='3'>$dicionario[$key] : $value</td>
       </tr>";
   }
    //email que será envia o checklist
    $to = $email;
    //Assunto do email
   $subject= "Checklist Mochila Rosa Diária: " .$dataLocal." - " .$novo["enfermagem"];

    //Mensagem em HTML uso o array $novo para identifica o que tem e o que está em 
    //falta no checklist
    $message="     <html>
                        <head>
                            <meta charset='UTF-8'>
                            <link rel='stylesheet' href='stilo.css'>
                            <!-- Meta tags Obrigatórias -->
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <!-- Bootstrap CSS -->
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                        </head>
                        <body>
                        <h3 class='text-center'>Checklist da Mochila Rosa Diária</h3>
                        <table class='table table-striped ' border='1' cellpadding='13' cellspacing='2' >
                        <tr >
                                <td colspan='2' '>Nome: ".$_POST["enfermagem"]."</td>
                                <td> Numero para reposição: ".$nOrden."</td>
                                
                                </tr>

                        <tr>
                            <td >Viatura: ".$_POST["vtr"]." </td>
                            <td >Lacre: ".$_POST["lacre"]."  </td>                      
                            <td> ". $_POST["plantao"]."</td>
                        </tr>
                       
                        <tr><th class='text-center'colspan='3'>Materiais Checados</th></tr>
                        
                        ".$corpo."

                        <tr>
                        <th colspan='3'>Observações:</th>
                        </tr>
                        <tr><td colspan='3'>".$_POST["obs"]."</td></tr>
                        </table>
                        </body>
                        </html>
             ";
         echo $message;
        //headers mime mais utf-8 cabeçalhos para o entendimento do gmail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        //Variavel que recebe o envio do email
        $sucess = mail ($to , $subject ,  $message , $headers);
        //Verifica se o email foi mandado com sucesso 
        if(!$sucess) {
            echo 'Não foi possível enviar a mensagem.<br>';
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;


        } else {
        //email enviado com sucesso alert JS
            echo "<script>alert('CheckList enviado com Sucesso')</script>";
        // echo " location.href='http://starhealth.com.br/checkNova/checklist.php';";

        } 
    }



//Documento HTML que exibe os itens que precisam ser reposto
include("lista.html");