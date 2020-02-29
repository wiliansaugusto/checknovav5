<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist Nova </title>
  </head>
  <body>

<div class="container">
  <div class="jumbotron">
    <h3 class="text-center">Checklist Mochila Rosa </h3>
    <h4 class="text-center">Conferência Completa, realizar a cada dia 28 do mês</h4> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilarosa" value="1">
    <div class="form-group">
    <label for="enfId">Enfermagem:</label>
    <input required type="text" class="form-control" name="enfermagem" id="enfId" placeholder="Seu Nome"><br>
    <label for="vtrID">Equipe</label>
    <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a equipe"><br>
    <label for="lacreID">Lacre:</label>
    <input required type="number" name="lacre" class="form-control" id="lacreID" placeholder="Informe o lacre da mochila"><br>
    <label for="exampleFormControlSelect2">Horário de Plantão</label>
                <select name="plantao" class="form-control" id="exampleFormControlSelect2" require>
                  <option >Diurno</option>
                  <option>Noturno</option>
                  <option>Evento</option>
                </select>
     
    </div>
    <h3 class="text-center">Ampolas</h3>

    <div class="form-group form-check">
        <div class="card">
    <h4 for="">Adenosina 6mg/2ml</h4>    
    <label for="qtAdeID">Quantidade de ampolas</label>
    <input id="qtAdeID" name="qtdAd" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valAdeID">Validade</label>
    <input type="date" name="valAde" id="valAdeID"><hr>
    </div>
<br>
<div class="card">
    <h4 for="">Agua de Injeção 10 Ml</h4>    
    <label for="qtaiID">Quantidade de ampolas</label>
    <input id="qtaiID" name="qtdAinj" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valaiID">Validade</label>
    <input type="date" name="valAInj" id="valaiID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Aminofilina 24 MG</h4>    
    <label for="qtAmiID">Quantidade de ampolas</label>
    <input id="qtAmiID" name="qtdAmi" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valAmiID">Validade</label>
    <input type="date" name="valAmi" id="valAmiID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Amiodarona 50mg/ml</h4>    
    <label for="qtAmiodID">Quantidade de ampolas</label>
    <input id="qtAmiodID" name="qtdAmio" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valAmioID">Validade</label>
    <input type="date" name="valAmio" id="valAmioID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Atropina 0,25 mg</h4>    
    <label for="qtAtropdID">Quantidade de ampolas</label>
    <input id="qtAtropdID" name="qtdAtrop" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valAtropID">Validade</label>
    <input type="date" name="valAtrop" id="valAtropID"><hr>
    </div>
    <br>
    
    <div class="card">
    <h4 for="">Buscopan Composto</h4>    
    <label for="qtBcID">Quantidade de ampolas</label>
    <input id="qtBcID" name="qtdBc" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valBcID">Validade</label>
    <input type="date" name="valBc" id="valBcID"><hr>
    </div>
    <br>
    
    <div class="card">
    <h4 for="">Buscopan Simples</h4>    
    <label for="qtBcsID">Quantidade de ampolas</label>
    <input id="qtBcsID" name="qtdBcs" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valBcsID">Validade</label>
    <input type="date" name="valBcs" id="valBcsID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Cetoprofeno 100mg/2ml</h4>    
    <label for="qtCetoID">Quantidade de ampolas</label>
    <input id="qtCetoID" name="qtdCeto" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valCetoID">Validade</label>
    <input type="date" name="valCeto" id="valCetoID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Decadron 4mg/ml</h4>    
    <label for="qtDecaID">Quantidade de ampolas</label>
    <input id="qtDecaID" name="qtdDeca" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDecaID">Validade</label>
    <input type="date" name="valDeca" id="valDecaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Deslanosideo 0,2 mg</h4>    
    <label for="qtDeslaID">Quantidade de ampolas</label>
    <input id="qtDeslaID" name="qtdDesla" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDeslaID">Validade</label>
    <input type="date" name="valDesla" id="valDeslaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Dipirona 500mg / ml</h4>    
    <label for="qtDipID">Quantidade de ampolas</label>
    <input id="qtDipID" name="qtdDip" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDipID">Validade</label>
    <input type="date" name="valDip" id="valDipID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Dobutamina 250mg/20Ml</h4>    
    <label for="qtDobuID">Quantidade de ampolas</label>
    <input id="qtDobuID" name="qtdDobu" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDobuID">Validade</label>
    <input type="date" name="valDobu" id="valDobuID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Dopamina 5mg / ML</h4>    
    <label for="qtDopaID">Quantidade de ampolas</label>
    <input id="qtDopaID" name="qtdDopa" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDopaID">Validade</label>
    <input type="date" name="valDopa" id="valDopaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Dramim B6 IM</h4>    
    <label for="qtDraIMID">Quantidade de ampolas</label>
    <input id="qtDraIMID" name="qtdDraIM" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDraIMID">Validade</label>
    <input type="date" name="valDraIM" id="valDraIMID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Dramim B6 Dl 10ML</h4>    
    <label for="qtDraDLID">Quantidade de ampolas</label>
    <input id="qtDraDLID" name="qtdDraDL" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDraDLID">Validade</label>
    <input type="date" name="valDraDL" id="valDraDLID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Epinefrina 1mg/ml</h4>    
    <label for="qtEpiID">Quantidade de ampolas</label>
    <input id="qtEpiID" name="qtdEpi" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valEpiID">Validade</label>
    <input type="date" name="valEpi" id="valEpiID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Fenergam 25mg/ml</h4>    
    <label for="qtFeneID">Quantidade de ampolas</label>
    <input id="qtFeneID" name="qtdFene" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFeneID">Validade</label>
    <input type="date" name="valFene" id="valFeneID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Furosemida 10mg/ml</h4>    
    <label for="qtFuroID">Quantidade de ampolas</label>
    <input id="qtFuroID" name="qtdFuro" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFuroID">Validade</label>
    <input type="date" name="valFuro" id="valFuroID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Glicose 50% 10ml</h4>    
    <label for="qtGlico50ID">Quantidade de ampolas</label>
    <input id="qtGlico50ID" name="qtdGlico50" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valGlico50ID">Validade</label>
    <input type="date" name="valGlico50" id="valGlico50ID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Glicose 25% 10ml </h4>    
    <label for="qtGlico25ID">Quantidade de ampolas</label>
    <input id="qtGlico25ID" name="qtdGlico25" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valGlico25ID">Validade</label>
    <input type="date" name="valGilco25" id="valGlico25ID"><hr>
    </div>
    <br>    

    <div class="card">
    <h4 for="">Hidralasina 20mg/ml </h4>    
    <label for="qtHidraID">Quantidade de ampolas</label>
    <input id="qtHidraID" name="qtdHidra" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valHidraID">Validade</label>
    <input type="date" name="valHidra" id="valHidraID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Ondansetrona 4mg </h4>    
    <label for="qtOndaID">Quantidade de ampolas</label>
    <input id="qtOndaID" name="qtdOnda" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valOndaID">Validade</label>
    <input type="date" name="valOnda" id="valOndaID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Plasil 10mg/2ml</h4>    
    <label for="qtPlaID">Quantidade de ampolas</label>
    <input id="qtPlaID" name="qtdPla" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valPlaID">Validade</label>
    <input type="date" name="valPla" id="valPlaID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Ranitidina 25mg/ml</h4>    
    <label for="qtRaniID">Quantidade de ampolas</label>
    <input id="qtRaniID" name="qtdRani" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valRaniID">Validade</label>
    <input type="date" name="valRani" id="valRaniID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Soro Fisiologico 10ML</h4>    
    <label for="qtSFID">Quantidade de ampolas</label>
    <input id="qtSFID" name="qtdSF" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valSFID">Validade</label>
    <input type="date" name="valSF" id="valSFID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Seloken 1 mg/ml</h4>    
    <label for="qtSeloID">Quantidade de ampolas</label>
    <input id="qtSeloID" name="qtdSelo" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valSeloID">Validade</label>
    <input type="date" name="valSelo" id="valSeloID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Sulfato de Magnésio 10% </h4>    
    <label for="qtSMID">Quantidade de ampolas</label>
    <input id="qtSMID" name="qtdSM" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valSMID">Validade</label>
    <input type="date" name="valSM" id="valSMID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Suxametônio 100mg</h4>    
    <label for="qtSuxaID">Quantidade de ampolas</label>
    <input id="qtSuxaID" name="qtdSuxa" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valSuxaID">Validade</label>
    <input type="date" name="valSuxa" id="valSuxaID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Terbutalina 0,5mg/ml</h4>    
    <label for="qtTerID">Quantidade de ampolas</label>
    <input id="qtTerID" name="qtdTer" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valTerID">Validade</label>
    <input type="date" name="valTer" id="valTerID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Voltaren 75mg</h4>    
    <label for="qtVoltID">Quantidade de ampolas</label>
    <input id="qtVoltID" name="qtdVolt" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valVoltID">Validade</label>
    <input type="date" name="valVolt" id="valVoltID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Cloreto de Potassio 19%</h4>    
    <label for="qtColPID">Quantidade de ampolas</label>
    <input id="qtColPID" name="qtdColP" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valColPID">Validade</label>
    <input type="date" name="valColP" id="valColPID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Cloreto de Sodio 20% </h4>    
    <label for="qtColSID">Quantidade de ampolas</label>
    <input id="qtColSID" name="qtdColS" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valColSID">Validade</label>
    <input type="date" name="valColS" id="valColSID"><hr>
    </div>
    <br>    
    <hr><h4 class="text-center">Comprimidos</h4><hr><br>
    <div class="card">
    <h4 for="">ASS 100mg</h4>    
    <label for="qtASSID">Quantidade de comprimidos</label>
    <input id="qtASSID" name="qtdASS" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valASSID">Validade</label>
    <input type="date" name="valASS" id="valASSID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Captopril 25 mg cp.</h4>    
    <label for="qtCapID">Quantidade de ampolas</label>
    <input id="qtCapID" name="qtdCap" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valCapID">Validade</label>
    <input type="date" name="valCap" id="valCapID"><hr>
    </div>
    
    <br>    
    <div class="card">
    <h4 for="">Clopidogrel 75mg</h4>    
    <label for="qtClopID">Quantidade de comprimidos</label>
    <input id="qtClopID" name="qtdClop" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valClopID">Validade</label>
    <input type="date" name="valClop" id="valClopID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Dipirona 500mg</h4>    
    <label for="qtDipCpID">Quantidade de comprimidos</label>
    <input id="qtDipCpID" name="qtdDipCp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valDipCpID">Validade</label>
    <input type="date" name="valDipCp" id="valDipCpID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Dorflex</h4>    
    <label for="qtDorID">Quantidade de comprimidos</label>
    <input id="qtDorID" name="qtdDor" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valDorID">Validade</label>
    <input type="date" name="valDor" id="valDorID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Dramin B6 50mg</h4>    
    <label for="qtDraCpID">Quantidade de comprimidos</label>
    <input id="qtDraCpID" name="qtdDraCp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valDraCpID">Validade</label>
    <input type="date" name="valDraCp" id="valDraCpID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Hidralazina 25mg</h4>    
    <label for="qtHidraCpID">Quantidade de comprimidos</label>
    <input id="qtHidraCpID" name="qtdHidraCp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valHidraCpID">Validade</label>
    <input type="date" name="valHidraCp" id="valHidraCpID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4>Loratadina </h4>    
    <label for="qtLoraID">Quantidade de comprimidos</label>
    <input id="qtLoraID" name="qtdLora" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valLoraID">Validade</label>
    <input type="date" name="valLora" id="valLoraID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Metildopa 250 mg</h4>    
    <label for="qtMetilID">Quantidade de comprimidos</label>
    <input id="qtMetilID" name="qtdMetil" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valMetilID">Validade</label>
    <input type="date" name="valMetil" id="valMetilID"><hr>
    </div>
    <br>    
    <div class="card">
    <h4 for="">Polaramine</h4>    
    <label for="qtPolID">Quantidade de comprimidos</label>
    <input id="qtPolID" name="qtdPol" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valPolID">Validade</label>
    <input type="date" name="valPol" id="valPolID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Propanolol 40mg</h4>    
    <label for="qtPropID">Quantidade de comprimidos</label>
    <input id="qtPropID" name="qtdProp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valPropID">Validade</label>
    <input type="date" name="valProp" id="valPropID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Ranitidina 150mg</h4>    
    <label for="qtRaniCpID">Quantidade de comprimidos</label>
    <input id="qtRaniCpID" name="qtdRaniCp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valRaniCpID">Validade</label>
    <input type="date" name="valRaniCp" id="valRaniCpID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Voltaren 500 mg</h4>    
    <label for="qtVoltCpID">Quantidade de comprimidos</label>
    <input id="qtVoltCpID" name="qtdVoltCp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valVoltCpID">Validade</label>
    <input type="date" name="valVoltCp" id="valVoltCpID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Isordil 0,5 mg</h4>    
    <label for="qtIsoID">Quantidade de comprimidos</label>
    <input id="qtIsoID" name="qtdIso" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valIsoID">Validade</label>
    <input type="date" name="valIso" id="valIsoID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Paracetamol</h4>    
    <label for="qtParaID">Quantidade de comprimidos</label>
    <input id="qtParaID" name="qtdPara" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valParaID">Validade</label>
    <input type="date" name="valPara" id="valParaID"><hr>
    </div>
    <br>   
    <hr><h2 class="text-center">Frascos</h2><hr>
    <div class="card">
    <h4 for="">Atrovent</h4>    
    <label for="qtAtrovID">Quantidade </label>
    <input id="qtAtrovID" name="qtdAtrov" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valAtrovID">Validade</label>
    <input type="date" name="valAtrov" id="valAtrovID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Buscopan Composto</h4>    
    <label for="qtFBcID">Quantidade </label>
    <input id="qtFBcID" name="qtdFBc" type="number" placeholder="Informe a quantidade " class="form-control"><br> 
    <label for="valFBcID">Validade</label>
    <input type="date" name="valFBc" id="valFBcID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Berotec</h4>    
    <label for="qtBeroID">Quantidade</label>
    <input id="qtBeroID" name="qtdBero" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valBeroID">Validade</label>
    <input type="date" name="valBero" id="valBeroID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Clorexedina Aquosa 0,2%</h4>    
    <label for="qtCloreID">Quantidade</label>
    <input id="qtCloreID" name="qtdClore" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valCloreID">Validade</label>
    <input type="date" name="valClore" id="valCloreID"><hr>
    </div>
    <br>  
    <div class="card">
    <h4 for="">Licodaina C/Vaso</h4>    
    <label for="qtLidoVID">Quantidade</label>
    <input id="qtLidoVID" name="qtdLidoV" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valLidoVID">Validade</label>
    <input type="date" name="valLidoV" id="valLidoVID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Lidocaina S/Vaso</h4>    
    <label for="qtLidoID">Quantidade</label>
    <input id="qtLidoID" name="qtdLido" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valLidoID">Validade</label>
    <input type="date" name="valLido" id="valLidoID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Dipirona 500mg</h4>    
    <label for="qtDipGID">Quantidade</label>
    <input id="qtDipGID" name="qtdDipG" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDipGID">Validade</label>
    <input type="date" name="valDipG" id="valDipGID"><hr>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Dramim B6 </h4>    
    <label for="qtDramGID">Quantidade</label>
    <input id="qtDramGID" name="qtdDramG" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valDramGID">Validade</label>
    <input type="date" name="valDramG" id="valDramGID"><br>
    </div>
    <br>   
    <div class="card">
    <h4 for="">Hidrocortizona 500mg</h4>    
    <label for="qtHidrocID">Quantidade</label>
    <input id="qtHidrocID" name="qtdHidroc" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valHidrocID">Validade</label>
    <input type="date" name="valHidroc" id="valHidrocID">
    </div>
    <br>  
    <div class="card">
    <h4 for="">Omeprazol 40mg</h4>    
    <label for="qtOmePID">Quantidade</label>
    <input id="qtOmePID" name="qtdOmeP" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valOmePID">Validade</label>
    <input type="date" name="valOmeP" id="valOmePID">
    </div>
    <br>        
    <div class="card">
    <h4 for="">Gel para ECG</h4>    
    <label for="qtGelID">Quantidade</label>
    <input id="qtGelID" name="qtdGel" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valGelID">Validade</label>
    <input type="date" name="valGel" id="valGelID">
    </div>
    <br>      
    <div class="card">
    <h4 for="">Heparina Sodica 5.000 UI</h4>    
    <label for="qtHepSodID">Quantidade</label>
    <input id="qtHepSodID" name="qtdHepSod" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valHepSodID">Validade</label>
    <input type="date" name="valHepSod" id="valHepSodID">
    </div>
    <br>      
    <div class="card">
    <h4 for="">Hidróxido de Aluminio</h4>    
    <label for="qtHidAlID">Quantidade</label>
    <input id="qtHidAlID" name="qtdHidAl" type="number" placeholder="Informe a quantidade" class="form-control"><br> 
    <label for="valHidAlID">Validade</label>
    <input type="date" name="valHidAl" id="valHidAlID">
    </div>
    <br>      
</div> 
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>



       <h3 class="text-center">Psicotropicos</h3>
<h3 class="text-center">Ampolas</h3>
    <div class="form-group form-check">
        <div class="card">
    <h4 for="">Amplicitil </h4>    
    <label for="qtAmplID">Quantidade de ampolas</label>
    <input id="qtAmplID" name="qtdAmpl" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valAmplID">Validade</label>
    <input type="date" name="valAmpl" id="valAmplID"><hr>
    </div>
<br>
<div class="card">
    <h4 for="">Cetamina</h4>    
    <label for="qtCetaID">Quantidade de ampolas</label>
    <input id="qtCetaID" name="qtdCeta" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valCetaID">Validade</label>
    <input type="date" name="valCeta" id="valCetaID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Clorpromatazina 25 mg</h4>    
    <label for="qtClorID">Quantidade de ampolas</label>
    <input id="qtClorID" name="qtdClor" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valClorID">Validade</label>
    <input type="date" name="valClor" id="valClorID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Diazepam 10 mg</h4>    
    <label for="qtDiazID">Quantidade de ampolas</label>
    <input id="qtDiazID" name="qtdDiaz" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valDiazID">Validade</label>
    <input type="date" name="valDiaz" id="valDiazID"><hr>
    </div>
    <br>

    <div class="card">
    <h4 for="">Etomidato 2MG</h4>    
    <label for="qtEtomidID">Quantidade de ampolas</label>
    <input id="qtEtomidID" name="qtdEtomi" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valEtomiID">Validade</label>
    <input type="date" name="valEtomi" id="valEtomiID"><hr>
    </div>
    <br>
    
    <div class="card">
    <h4 for="">Fenetoina Sódica 5 ML (hidantal) </h4>    
    <label for="qtFeneID">Quantidade de ampolas</label>
    <input id="qtFeneID" name="qtdFene" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFeneID">Validade</label>
    <input type="date" name="valFene" id="valFeneID"><hr>
    </div>
    <br>
    
    <div class="card">
    <h4 for="">Fenobarbital (Gardenal)</h4>    
    <label for="qtFenoBID">Quantidade de ampolas</label>
    <input id="qtFenoBID" name="qtdFenoB" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFenoBID">Validade</label>
    <input type="date" name="valFenoB" id="valFenoBID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Fentanil</h4>    
    <label for="qtFentaID">Quantidade de ampolas</label>
    <input id="qtFentaID" name="qtdFenta" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFentaID">Validade</label>
    <input type="date" name="valFenta" id="valFentaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Flumazenil</h4>    
    <label for="qtFlumaID">Quantidade de ampolas</label>
    <input id="qtFlumaID" name="qtdFluma" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valFlumaID">Validade</label>
    <input type="date" name="valFluma" id="valFlumaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Halopedirol</h4>    
    <label for="qtHaloID">Quantidade de ampolas</label>
    <input id="qtHaloID" name="qtdHalo" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valHaloID">Validade</label>
    <input type="date" name="valHalo" id="valHaloID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Midazolam 5MG</h4>    
    <label for="qtMidaID">Quantidade de ampolas</label>
    <input id="qtMidaID" name="qtdMida" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valMidaID">Validade</label>
    <input type="date" name="valMida" id="valMidaID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Morfina 0,2MG</h4>    
    <label for="qtMorfID">Quantidade de ampolas</label>
    <input id="qtMorfID" name="qtdMorf" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valMorfID">Validade</label>
    <input type="date" name="valMorf" id="valMorfID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Naloxona</h4>    
    <label for="qtNaloID">Quantidade de ampolas</label>
    <input id="qtNaloID" name="qtdNalo" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valNaloID">Validade</label>
    <input type="date" name="valNalo" id="valNaloID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Petidina 50MG</h4>    
    <label for="qtPetiID">Quantidade de ampolas</label>
    <input id="qtPetiID" name="qtdPeti" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valPetiID">Validade</label>
    <input type="date" name="valPeti" id="valPetiID"><hr>
    </div>
    <br>
    <div class="card">
    <h4 for="">Tramal</h4>    
    <label for="qtTramalID">Quantidade de ampolas</label>
    <input id="qtTramalID" name="qtdTramal" type="number" placeholder="Informe a quantidade de ampolas" class="form-control"><br> 
    <label for="valTramalID">Validade</label>
    <input type="date" name="valTramal" id="valTramalID"><hr>
    </div>
    <br>
    <hr><h4 class="text-center">Comprimidos</h4><hr><br>
    <div class="card">
    <h4 for="">Diazepam - Comprimido</h4>    
    <label for="qtDiazCompID">Quantidade de comprimidos</label>
    <input id="qtDiazCompID" name="qtdDiazComp" type="number" placeholder="Informe a quantidade de comprimidos" class="form-control"><br> 
    <label for="valDiazCompID">Validade</label>
    <input type="date" name="valDiazComp" id="valDiazCompID"><hr>
    </div>
    <br>    
    </div> 
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea name="obsPsico"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>
                            
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