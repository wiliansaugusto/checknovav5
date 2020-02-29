<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist NOVA Emergências Médicas</title>
  </head>
  <body>

<div class="container">
  <div class="jumbotron">
    <h3 class="text-center">Checklist Viatura Avançada</h3> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post" name="">
    <input type="hidden" name="checklistsav" value="1">
    <div class="form-group">
    <label for="enfId">Enfermagem:</label>
    <input required type="text" class="form-control" name="enfermagem" id="enfId" placeholder="Seu Nome"><br>
    <label for="condId">Condutor:</label>
    <input required type="text" class="form-control" name="condutor" id="condId" placeholder="Nome do Condutor"><br>
    <label for="vtrID">Equipe</label>
    <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a equipe"><br>
    <label for="exampleFormControlSelect2">Horário de Plantão</label>
                <select name="plantao" class="form-control" id="exampleFormControlSelect2" require>
                  <option >Diurno</option>
                  <option>Noturno</option>
                  <option>Evento</option>
                </select>
    
    </div>
  
    <div class="form-group form-check">
    <input name="cel" value="ok" type="checkbox"  id="celId">
    <label  for="celId">Celular + Carregador</label><br>
    <input name="maca" value="ok" type="checkbox"  id="macaID">
    <label  for="macaID">Maca com Rodas</label><br>
    <input name="mLona" value="ok" type="checkbox"  id="mLonaID">
    <label  for="mLonaID">Maca de Lona</label><br>
    <input name="mangueira" value="ok" type="checkbox"  id="mangueiraID">
    <label  for="mangueiraID">Mangueira O²</label><br>
    <input name="cadeira" value="ok" type="checkbox"  id="cadeiraID">
    <label  for="cadeiraID">Cadeira de Rodas</label><br>
    <input name="oximetro" value="ok" type="checkbox"  id="oximetroID">
    <label  for="oximetroID">Oxímetro de dedo</label><br>
    <input name="term" value="ok" type="checkbox"  id="termID">
    <label  for="termID">Termômetro</label><br>
    <input name="esfig" value="ok" type="checkbox"  id="esfigID">
    <label  for="esfigID">Esfigmomanômetro</label><br>
    <input name="esteto" value="ok" type="checkbox"  id="estetoID">
    <label  for="estetoID">Estetoscópio</label><br>
    <input name="dextro" value="ok" type="checkbox"  id="dextroID">
    <label  for="dextroID">Dextro</label><br>
    <input name="otoscopio" value="ok" type="checkbox"  id="otoscopioID">
    <label  for="otoscopioID">Otoscópio</label><br>
    <input name="ambuA" value="ok" type="checkbox"  id="ambuAID">
    <label  for="ambuAID">BVM - Adulto</label><br>
    <input name="ambuPed" value="ok" type="checkbox"  id="ambuPedID">
    <label  for="ambuPedID">BVM - Pediatrico</label><br>
    <input name="prancha" value="ok" type="checkbox"  id="pranchaID">
    <label  for="pranchaID">Prancha Rigida</label><br>
    <input name="mPrancha" value="ok" type="checkbox"  id="mPranchaID">
    <label  for="mPranchaID">Meia Prancha</label><br>
    <input name="headB" value="ok" type="checkbox"  id="headBID">
    <label  for="headBID">Head Block</label><br>
    <input name="tirantes" value="ok" type="checkbox"  id="tirantesID">
    <label  for="tirantesID">Tirantes de Fixação (3)</label><br>
    <input  type="checkbox"  value="ok"name="kHig" id="kHigId">
    <label for="kHigId">Kit de Higienização</label><br>
    <input  type="checkbox" value="ok" name="boca" id="bocaId" >
    <label for="bocaId">Chave de Boca</label><br><br>    
    <label  for="malaTID">Mochila de Trauma</label><br>
    <input required type="text" name="malaT" class="form-control" id="malaTID" placeholder="Informe o numero do Lacre"><br>
    <label  for="malaRosaID">Mochila Rosa</label>
    <input required type="text" name="malaRosa" class="form-control" id="malaRosaID" placeholder="Informe o numero do Lacre"><br>
    <label  for="malaAzulID">Mochila Azul</label>
    <input required type="text" name="malaAzul" class="form-control" id="malaAzulID" placeholder="Informe o numero do Lacre"><br>
    <label  for="malaVermelhalID">Mochila Vermelha</label>
    <input required type="text" name="malaVermelha" class="form-control" id="malaVermelhaID" placeholder="Informe o numero do Lacre"><br>
    <label  for="malaPsicolID">Mochila Psicotrópico</label>
    <input required type="text" name="malaPsico" class="form-control" id="malaPsicoID" placeholder="Informe o numero do Lacre"><br>
    <label  for="malaVerdeID">Mochila Verde</label>
    <input required type="text" name="malaVerde" class="form-control" id="malaVerdeID" placeholder="Informe o numero do Lacre"><br>
    
    <br>                        
    <h5 class="text-center">Régua de gases</h5>
    <label for="o2gId">Cilindro O² Grande:</label>
    <input required type="number" class="form-control" name="o2g" id="o2gId"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2g2Id">Cilindro O² Grande Reserva:</label>
    <input required type="number" class="form-control" name="o2g2" id="o2g2Id"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2pId">Cilindro O² Portátil:</label>
    <input required type="number" class="form-control" name="o2p" id="o2pId"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2lSId">Cilindro O² Portátil Reserva:</label>
    <input required type="number" class="form-control" name="o2lr" id="o2lrId"  placeholder="Informe a quantidade de libras"><br>
    
    <input name="umi" value="ok" type="checkbox"  id="umiID">
    <label  for="umiID">Umidificador</label><br>
    <input name="aspi" value="ok" type="checkbox"  id="aspiID">
    <label  for="aspiID">Frasco Aspiração</label><br>
    <input name="flux" value="ok" type="checkbox"  id="fluxID">
    <label  for="fluxID">Fluxômentro</label><br>
    <input name="mano" value="ok" type="checkbox"  id="manoID">
    <label  for="manoID">Manômetro</label><br>
    </div>
    <h4 class="text-center">Equipamentos</h4>
    <div class="form-group form-check">
    <label for="respId">Respirador Mecânico de Transporte</label><br>
    <input required id="respID" name="respirador" type="text" placeholder="Informe o Modelo que está na VTR" class="form-control"><br>      
    <input name="fonteResp" value="ok" type="checkbox"  id="fonteRespID">
    <label  for="fonteRespID">Carregador (Fonte de Alimentação)</label><br>
    <input name="circAdulto" value="ok" type="checkbox"  id="circID">
    <label  for="circID">Circuito de Ventilação Mecânica Adulto</label><br>
    <input name="circInf" value="ok" type="checkbox"  id="circIId">
    <label  for="circIId">Circuito de Ventilação Mecanica Infantil</label><br><br>
    <label for="cardioID">Monitor de Transporte - Cardioversor</label><br>
    <input required id="cardioID" name="cardio" type="text" placeholder="Informe o Modelo que está na VTR" class="form-control"><br>      
    <input name="cabod" value="ok" type="checkbox"  id="cabodID">
    <label  for="cabodID">Cabo Monitorização + Fonte</label><br>
    <input name="cabo02m" value="ok" type="checkbox"  id="cabo02ID">
    <label  for="cabo02ID">Sensor O²  (Cardioversor)</label><br><br>
    <label for="cardioID">Monitor Multiparamentros</label><br>
    <input required id="cardioID" name="multi" type="text" placeholder="Informe o Modelo que está na VTR" class="form-control"><br>      
    <input name="cabom" value="ok" type="checkbox"  id="cabomID">
    <label  for="cabomID">Cabo Monitorização + Fonte (MULTI)</label><br>
    <input name="cabo02m" value="ok" type="checkbox"  id="cabo02ID">
    <label  for="cabo02ID">Braçadeiras (MULTI)</label><br>
    <input name="cabo02m" value="ok" type="checkbox"  id="cabo02ID">
    <label  for="cabo02ID">Sensor O²  (MULTI)</label><br>
    <input name="cabo02m" value="ok" type="checkbox"  id="cabo02ID">
    <label  for="cabo02ID">Sensor Temperatura  (MULTI)</label><br>
    <label for="bombaId">Bomba de Infusão</label><br>
    <input id="bombaID" name="bomba" type="text" placeholder="Informe o Modelo que está na VTR" class="form-control"><br>      
    <input id="bombaQTDID" name="bombaQTD" type="number" placeholder="Informe a quantidade de bombas na VTR" class="form-control"><br>      
  
    </div> 

    <div class="card-body">
        <h5 class="card-title">Limpeza Interna</h5>
        <select name="limpezaInt" class="form-control" id="exampleFormControlSelect3" require>
        <option >Regular</option>
        <option>Boa</option>
        <option>Pessima</option>
        </select>
    </div>
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea placeholder="Observações Gerais"name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>
                   
    <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>

   </form>
  </div>
</div>


    <?php include ('pe.php')?>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-4.4.1.slim.min.js" integrity="sha484-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha484-ApNbgh9B+Y1QKtv4Rn7W4mgPxhU9K/ScQsAP7hUibX49j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha484-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>