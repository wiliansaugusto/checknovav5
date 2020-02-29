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
    <h4 class="text-center">Conferência Simples, realização diária</h4> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilarosasimples" value="1">
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
    
    <input id="qtaiID" name="Agua" type="checkbox" value="OK" >
    <label for="qtaiID">Agua de Injeção 10 Ml (5)</label><br>

   <input id="qtAdeID" name="Adenosina" type="checkbox" value="OK" >
   <label for="qtAdeID">Adenosina 6mg/2ml (4)</label><br>

    <input id="qtAmiID" name="Aminofilina" type="checkbox" value="OK" >
    <label for="qtAmiID">Aminofilina 24 MG(4)</label><br>
    
    <input id="qtAmiodID" name="Amiodarona" type="checkbox" value="OK" >
    <label for="qtAmiodID">Amiodarona 50mg/ml (4)</label><br>
   
    <input id="qtAtropdID" name="Atropina" type="checkbox" value="OK" >
    <label for="qtAtropdID">Atropina 0,25 mg (8)</label><br>
  
    <input id="qtBcID" name="BuscopanComp" type="checkbox" value="OK" >
    <label for="qtBcID">Buscopan Composto (4)</label><br>
           
    <input id="qtBcsID" name="BuscopanSimples" type="checkbox" value="OK" >
    <label for="qtBcsID">Buscopan Simples (4)</label><br>
   
    <input id="qtCetoID" name="Cetoprofeno" type="checkbox" value="OK" >
    <label for="qtCetoID">Cetoprofeno 100mg/2ml (4)</label><br>
   
    <input id="qtDecaID" name="Decadron" type="checkbox" value="OK" >
    <label for="qtDecaID">Decadron 4mg/ml (4)</label><br>
    
    <input id="qtDeslaID" name="Deslanosideo" type="checkbox" value="OK" >
    <label for="qtDeslaID">Deslanosideo 0,2 mg (4)</label><br>
    
        
    <input id="qtDipID" name="Dipirona" type="checkbox" value="OK" >
    <label for="qtDipID">Dipirona 500mg/ml (4)</label><br>
   
        
    <input id="qtDobuID" name="Dobutamina" type="checkbox" value="OK" >
    <label for="qtDobuID">Dobutamina 250mg/20Ml (4)</label><br>
    
    <input id="qtDopaID" name="Dopamina" type="checkbox" value="OK" >
    <label for="qtDopaID">Dopamina 5mg / ML (4)</label><br>
        
    <input id="qtDraIMID" name="DramimIm" type="checkbox" value="OK" >
    <label for="qtDraIMID">Dramim B6 IM (4)</label><br>
     
    <input id="qtDraDLID" name="DramimDl" type="checkbox" value="OK" >
    <label for="qtDraDLID">Dramim B6 Dl 10ML (4)</label><br>
  
    <input id="qtEpiID" name="Epinefrina" type="checkbox" value="OK" >
    <label for="qtEpiID">Epinefrina 1mg/ml (8)</label><br>
     
    <input id="qtFeneID" name="Fenergam" type="checkbox" value="OK" >
    <label for="qtFeneID">Fenergam 25mg/ml (4)</label><br>
   
    <input id="qtFuroID" name="Furosemida" type="checkbox" value="OK" >
    <label for="qtFuroID">Furosemida 10mg/ml (8)</label><br>
           
    <input id="qtGlico50ID" name="Glicose50" type="checkbox" value="OK" >
    <label for="qtGlico50ID">Glicose 50% 10ml (4)</label><br>
    
    <input id="qtGlico25ID" name="Glicose25" type="checkbox" value="OK" >
    <label for="qtGlico25ID">Glicose 25% 10ml (4)</label><br>
       
    <input id="qtHidraID" name="Hidralasina" type="checkbox" value="OK" >
    <label for="qtHidraID">Hidralasina 20mg/ml (4)</label><br>
    
    <input id="qtOndaID" name="Ondansetrona" type="checkbox" value="OK" >
    <label for="qtOndaID">Ondansetrona 4mg (4)</label><br>
   
    <input id="qtPlaID" name="Plasil" type="checkbox" value="OK" >
    <label for="qtPlaID">Plasil 10mg/2ml (4)</label><br>
    
    <input id="qtRaniID" name="Ranitidina" type="checkbox" value="OK" >
    <label for="qtRaniID">Ranitidina 25mg/ml (4)</label><br>
    
    <input id="qtSFID" name="SF10" type="checkbox" value="OK" >
    <label for="qtSFID">Soro Fisiologico 10ML (4)</label><br>
      
    <input id="qtSeloID" name="SelOKen" type="checkbox" value="OK" >
    <label for="qtSeloID">SeloKen 1 mg/ml (4)</label><br>
      
    <input id="qtSMID" name="MGSO4" type="checkbox" value="OK" >
    <label for="qtSMID">Sulfato de Magnésio 10% (4)</label><br>
      
    
    <input id="qtSuxaID" name="Suxametônio" type="checkbox" value="OK" >
    <label for="qtSuxaID">Suxametônio 100mg (4)</label><br>
     
    <input id="qtTerID" name="Terbutalina" type="checkbox" value="OK" >
    <label for="qtTerID">Terbutalina 0,5mg/ml (4)</label><br>
       
    <input id="qtVoltID" name="Voltaren" type="checkbox" value="OK" >
    <label for="qtVoltID">Voltaren 75mg (4)</label><br>
        
    <input id="qtColPID" name="KCL" type="checkbox" value="OK" >
    <label for="qtColPID">Cloreto de Potassio 19% (4)</label><br>
    
    <input id="qtColSID" name="NACL" type="checkbox" value="OK" >
    <label for="qtColSID">Cloreto de Sodio 20% (4)</label><br>
      
    <hr><h4 class="text-center">Comprimidos</h4><hr>   

    <input id="qtASSID" name="ASS" type="checkbox" value="OK" >
    <label for="qtASSID">ASS 100mg (4)</label><br>
            
    <input id="qtCapID" name="Captopril" type="checkbox" value="OK" >
    <label for="qtCapID">Captopril 25 mg cp (8)</label><br>
    
    <input id="qtClopID" name="Clopidogrel" type="checkbox" value="OK" >
    <label for="qtClopID">Clopidogrel 75mg (8)</label><br>
      
    <input id="qtDipCpID" name="DipironaCp" type="checkbox" value="OK" >
    <label for="qtDipCpID">Dipirona 500mg (4)</label><br>
   
    <input id="qtDorID" name="Dorflex" type="checkbox" value="OK" >
    <label for="qtDorID">Dorflex (4)</label><br>
    
    <input id="qtDraCpID" name="DraminCp" type="checkbox" value="OK" >
    <label for="qtDraCpID">Dramin B6 50mg (4)</label><br>
    
    <input id="qtHidraCpID" name="Hidralazina" type="checkbox" value="OK" >
    <label for="qtHidraCpID">Hidralazina 25mg (4)</label><br>
       
    <input id="qtLoraID" name="Loratadina" type="checkbox" value="OK" >
    <label for="qtLoraID">Loratadina (4)</label><br>
 
    <input id="qtMetilID" name="Metildopa" type="checkbox" value="OK" >
    <label for="qtMetilID">Metildopa 250 mg (4)</label><br>
    
    <input id="qtPolID" name="Polaramine" type="checkbox" value="OK" >
    <label for="qtPolID">Polaramine (4)</label><br>
   
    <input id="qtPropID" name="Propanolol" type="checkbox" value="OK" >
    <label for="qtPropID">Propanolol 40mg (4)</label><br>
   
    <input id="qtVoltCpID" name="VoltarenCp" type="checkbox" value="OK" >
    <label for="qtVoltCpID">Voltaren 500 mg (4)</label><br>
    
    <input id="qtIsoID" name="Isordil" type="checkbox" value="OK" >
    <label for="qtIsoID">Isordil 0,5 mg (8)</label><br>
     
    <input id="qtParaID" name="Paracetamol" type="checkbox" value="OK" >
    <label for="qtParaID">Paracetamol (4)</label><br>
   
    <hr><h4 class="text-center">Frascos</h4><hr>
    
    <input id="qtAtrovID" name="Atrovent" type="checkbox"  value="OK">
    <label for="qtAtrovID">Atrovent </label><br>
   
    
    <input id="qtBeroID" name="Berotec" type="checkbox"  value="OK">
    <label for="qtBeroID">Berotec</label><br>
    
    <input id="qtFBcID" name="BuscopanGts" type="checkbox" value="OK" >
    <label for="qtFBcID">Buscopan Composto Gotas </label><br>
    
    <input id="qtCloreID" name="Clorexedina" type="checkbox"  value="OK">
    <label for="qtCloreID">Clorexedina Aquosa 0,2%</label><br>
     
    
    <input id="qtLidoVID" name="LidoV" type="checkbox" value="OK" >
    <label for="qtLidoVID">Licodaina C/Vaso</label><br>
      
    
    <input id="qtLidoID" name="Lido" type="checkbox"  value="OK">
    <label for="qtLidoID">Lidocaina S/Vaso</label><br>
      
    <input id="qtDipGID" name="DipG" type="checkbox" value="OK" >
    <label for="qtDipGID">Dipirona 500mg</label><br>
     
       
    <input id="qtDramGID" name="DramimGts" type="checkbox"  value="OK">
    <label for="qtDramGID">Dramim B6 Gts</label><br>
    
    
    <input id="qtHidrocID" name="Hidrocortizona" type="checkbox"  value="OK">
    <label for="qtHidrocID">Hidrocortizona 500mg</label><br>
     
    
    <input id="qtOmePID" name="Omeprazol" type="checkbox"  value="OK">
    <label for="qtOmePID">Omeprazol 40mg</label><br>
    
    <input id="qtGelID" name="GelECG" type="checkbox"  value="OK">
    <label for="qtGelID">Gel para ECG</label><br>
 
    <input id="qtHepSodID" name="Heparina" type="checkbox"  value="OK">
    <label for="qtHepSodID">Heparina Sodica 5.000 UI</label><br>

    <input id="qtHidAlID" name="Aluminio" type="checkbox"  value="OK">
    <label for="qtHidAlID">Hidróxido de Aluminio</label><br>

    
</div> 
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>
                   
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