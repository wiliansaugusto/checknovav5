<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dCetaS6JXm" crossorigin="anonymous">

    <title>Checklist Nova </title>
  </head>
  <body>

<div class="contCetaner">
  <div class="jumbotron">
    <h3 class="text-center">Checklist Mochila Azul</h3> 
    <p>Insira os dados abaixo:</p>
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilaazul" value="1">
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
    <h4 class="alert alert-success text-center">Checar os intens abaixo:</h4>
    <div class="form-group form-check">

    <input id="bvmAId" name="bvmA"  type="checkbox" value="OK"/> 
    <label for="bvmAId">BVM c/ Reservatório Adulto</label><br>
    <input id="bvmPedID" name="bvmPed" type="checkbox" value="OK"/> 
    <label for="bvmPedID">BVM c/ Reservatório Pediatrico</label><br>
    <input id="cbLaringoID" name="cbLaringo" type="checkbox" value="OK"/>  
    <label for="cbLaringoID">Cabo de Laringoscópio</label><br>
    <input id="cadarcoID" name="cadarco" type="checkbox" value="OK"/> 
    <label for="cadarcoID">Cadarço Cordex - 1M</label><br>
    <input id="cot65ID" name="cot65" type="checkbox" value="OK"/> 
    <label for="cot65ID">Canula Endotraqueal c/Cuff Nr° 6.5</label><br>
    <input id="cot7ID" name="cot7" type="checkbox" value="OK"/> 
    <label for="cot7ID">Canula Endotraqueal c/Cuff Nr° 7 </label><br>
    <input id="cot75ID" name="cot75" type="checkbox" value="OK"/>  
    <label for="cot75ID">Canula Endotraqueal c/Cuff Nr° 7.5</label><br>
    <input id="cot8ID" name="cot8" type="checkbox" value="OK"/>  
    <label for="cot8ID">Canula Endotraqueal c/Cuff Nr° 8</label><br>
    <input id="cot85ID" name="cot85" type="checkbox" value="OK"/>  
    <label for="cot85ID">Canula Endotraqueal c/Cuff Nr° 8.5</label><br>
    <input id="cot2sID" name="cot2s" type="checkbox" value="OK"/>  
    <label for="cot2sID">Canula Endotraqueal s/Cuff Nr° 2.0</label><br>
    <input id="cot25sID" name="cot25s" type="checkbox" value="OK"/>  
    <label for="cot25sID">Canula Endotraqueal s/Cuff Nr° 2.5</label><br>
       <input id="cot3sID" name="cot3s" type="checkbox" value="OK"/>  
    <label for="cot3sID">Canula Endotraqueal s/Cuff Nr° 3.0</label><br>
   <input id="cot4sID" name="cot4s" type="checkbox" value="OK"/>  
    <label for="cot4sID">Canula Endotraqueal s/Cuff Nr° 4.0</label><br>
    <input id="cot5sID" name="cot5s" type="checkbox" value="OK"/>  
    <label for="cot5sID">Canula Endotraqueal s/Cuff Nr° 5.0</label><br>
      <input id="guedel0ID" name="guedel0" type="checkbox" value="OK"/>  
    <label for="guedel0ID">Canula de Guedel Nr° 0</label><br>
       <input id="quedel1ID" name="quedel1" type="checkbox" value="OK"/>  
    <label for="quedel1ID">Canula de Guedel Nr° 1</label><br>
       <input id="guedel2ID" name="guedel2" type="checkbox" value="OK"/>  
    <label for="guedel2ID">Canula de Guedel Nr° 2</label><br>
    <input id="guedel3ID" name="guedel3" type="checkbox" value="OK"/>  
    <label for="guedel3ID">Canula de Guedel Nr° 3</label><br>
    <input id="guedel4ID" name="guedel4" type="checkbox" value="OK"/>  
    <label for="guedel4ID">Canula de Guedel Nr° 4</label><br>
    <input id="guedel5ID" name="guedel5" type="checkbox" value="OK"/> 
    <label for="guedel5ID">Canula de Guedel Nr° 5</label><br>
    <input id="catNasalID" name="catNasal" type="checkbox" value="OK"/> 
    <label for="catNasalID">Cateter Nasal Tipo Oculos</label><br>
   
    
    
    <input id="gazeID" name="gaze" type="checkbox" value="OK"/>  
     <label for="gazeID">Gaze Esteril 7,5CM</label><br>
    
    <input id="nebulaAID" name="nebulaA" type="checkbox" value="OK"/>  
    <label for="nebulaAID">Conj. Nebulização Adulto</label><br>
    
    <input id="nebulaIID" name="nebulaI" type="checkbox" value="OK"/>  
    <label for="nebulaIID">Conj. Nebulização Infantil</label><br>
    
    <input id="fBactID" name="fBact" type="checkbox" value="OK"/>  
    <label for="fBactID">Filtro Bacteriano Circuito Respiratorio</label><br>
    
    <input id="fioID" name="fio" type="checkbox" value="OK"/>  
    <label for="fioID">Fio Guia</label><br>
    
    <input id="cricoID" name="crico" type="checkbox" value="OK"/> 
    <label for="cricoID">Kit Cricotiroidostomia - 2019</label><br>
    
    <input id="lc0ID" name="lc0" type="checkbox" value="OK"/> 
    <label for="lc0ID">Lamina Curva Nr° 0</label><br>
    
    <input id="lc1ID" name="lc1" type="checkbox" value="OK"/> 
    <label for="lc1ID">Lamina Curva Nr° 1</label><br>
    
    <input id="lc2ID" name="lc2" type="checkbox" value="OK"/> 
    <label for="lc2ID">Lamina Curva Nr° 2</label><br>
    
    <input id="lc3ID" name="lc3" type="checkbox" value="OK"/> 
    <label for="lc3ID">Lamina Curva Nr° 3</label><br>
    
    <input id="lc4ID" name="lc4" type="checkbox" value="OK"/> 
    <label for="lc4ID">Lamina Curva Nr° 4</label><br>
    
    <input id="lc5ID" name="lc5" type="checkbox" value="OK"/> 
    <label for="lc5ID">Lamina Curva Nr° 5</label><br>
    
    <input id="lidoID" name="lido" type="checkbox" value="OK"/> 
    <label for="lidoID">Lidocaina Gel 2% 30 GR</label><br>
    
    <input id="luvasPID" name="luvasP" type="checkbox" value="OK"/> 
    <label for="luvasPID">Luvas Plastica Esteril Transparente</label><br>
    
    <input id="luvaID" name="luva" type="checkbox" value="OK"/> 
    <label for="luvaID">Luvas Esteril Nr° 7.5</label><br>
    
    <input id="luva8ID" name="luva8" type="checkbox" value="OK"/> 
    <label for="luva8ID">Luva Esteril Nr° 8.5</label><br>
    
    <input id="mascPID" name="mascP" type="checkbox" value="OK"/> 
    <label for="mascPID">Máscara com Reservatório Pediatrica <br> Alta Concentração</label><br>
    
    <input id="mascAID" name="mascA" type="checkbox" value="OK"/> 
    <label for="mascAID">Máscara com Reservatório Adulta <br> Alta Concentração</label><br>
    
    <input id="masDID" name="masD" type="checkbox" value="OK"/> 
    <label for="masDID">Mascara Descartavel</label><br>
    
    <input id="masN95ID" name="masN95" type="checkbox" value="OK"/> 
    <label for="masN95ID">Mascara N95</label><br>
    
    <input id="mascL1ID" name="mascL1" type="checkbox" value="OK"/> 
    <label for="mascL1ID">Máscara Laringea Nr° 1 <br>
    <span class="text-center"><p>(Até 5 Kilos)</p></span></label><br>
    
    <input id="mascl15ID" name="mascl15" type="checkbox" value="OK"/> 
    <label for="mascl15ID">Mascara Laringea Nr° 1.5 <br>
    <span class="text-center"><p>(5 Kilos À 10 Kilos)</p></span></label><br>
    
    <input id="mascL25ID" name="mascL25" type="checkbox" value="OK"/> 
    <label for="mascL25ID">Mascara Laringea Nr° 2.5 <br>
    <span class="text-center"><p>(20 Kilos À 30 Kilos)</p></span></label><br>
    
    <input id="mascL3ID" name="mascL3" type="checkbox" value="OK"/> 
    <label for="mascL3ID">Mascara Laringea Nr° 3 <br>
    <span class="text-center"><p>(30 Kilos À 50 Kilos)</p></span></label><br>
    
    <input id="mascL4ID" name="mascL4" type="checkbox" value="OK"/> 
    <label for="mascL4ID">Mascara Laringea Nr° 4 <br>
    <span class="text-center"><p>(50 Kilos À 70 Kilos)</p></span></label><br>
    
    <input id="masL5ID" name="masL5" type="checkbox" value="OK"/> 
    <label for="masL5ID">Mascara Laringea Nr° 5 <br>
    <span class="text-center"><p>(Acima de 70 Kilos)</p></span></label><br>
    
    <input id="mascTID" name="mascT" type="checkbox" value="OK"/> 
    <label for="mascTID">Mascara Traqueia Adulto</label><br>
    
    <input id="mascTIID" name="mascTI" type="checkbox" value="OK"/> 
    <label for="mascTIID">Mascara Traqueia Infantil</label><br>
    
    <input id="oculoProtID" name="oculoProt" type="checkbox" value="OK"/> 
    <label for="oculoProtID">Oculos de Proteção</label><br>
    
    <input id="maguilID" name="maguil" type="checkbox" value="OK"/>  
    <label for="maguilID">Pinça Maguill</label><br>
    
    <input id="sering10ID" name="sering10" type="checkbox" value="OK"/>  
    <label for="sering10ID">Seringa Descartavel 10ML</label><br>
    
    <input id="sonda6ID" name="sonda6" type="checkbox" value="OK"/>  
    <label for="sonda6ID">Sonda de Aspiração Nr° 6 </label><br>
    
    <input id="sonda8ID" name="sonda8" type="checkbox" value="OK"/>  
    <label for="sonda8ID">Sonda de Aspiração Nr° 8</label><br>
    
    <input id="sonda10ID" name="sonda10" type="checkbox" value="OK"/> 
    <label for="sonda10ID">Sonda de Aspiração Nr° 10</label><br>
    
    <input id="sonda12ID" name="sonda12" type="checkbox" value="OK"/> 
    <label for="sonda12ID">Sonda de Aspiração Nr° 12</label><br>
    
    <input id="sonda14ID" name="sonda14" type="checkbox" value="OK"/> 
    <label for="sonda14ID">Sonda de Aspiração Nr° 14</label><br>
    
    
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