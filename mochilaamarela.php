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
    <h3 class="text-center">Checklist Mochila Básica</h3> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilaAmarela" value="1">
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
  
    <div class="form-group form-check">
    <input name="aguaB" value="ok" type="checkbox"  id="aguaBID">
    <label  for="aguaBID">Agua Bidestilada 10ml</label><br>
    <input name="aAsp" value="ok" type="checkbox"  id="aAspID">
    <label  for="aAspID">Agulha de aspiração 40x12</label><br>
    <input name="aMangaLonga" value="ok" type="checkbox"  id="aMangaLongaID">
    <label  for="aMangaLongaID">Avental Proc Manga Longa(2)</label><br>
    <input name="bloodS" value="ok" type="checkbox"  id="bloodS">
    <label  for="bloodS">Blood Stop </label><br>
    <input name="CN" value="ok" type="checkbox"  id="CNID">
    <label  for="CNID">Cateter Nasal tipo óculos + Extensão </label><br>
    <input name="Cloreto" value="ok" type="checkbox"  id="CloretoID">
    <label  for="CloretoID">Cloreto de Sódio 0,9% 10 ML</label><br>
    <input name="CompEs" value="ok" type="checkbox"  id="CompEsID">
    <label  for="CompEsID">Compressa Estéril 7,5CM (5)</label><br>
    <input name="glicose" value="ok" type="checkbox"  id="glicoseID">
    <label  for="glicoseID">Glicose 50% 10ML</label><br>
    <input name="KitParto" value="ok" type="checkbox"  id="KitPartoID">
    <label  for="KitPartoID">Kit Parto</label><br>
    <input name="Kitq" value="ok" type="checkbox"  id="KitqID">
    <label  for="KitqID">Kit Queimados e Eviscerados</label><br>
    <input name="Lido" value="ok" type="checkbox"  id="LidoID">
    <label  for="LidoID">Lidocáina Gel 2% 30 GR</label><br>
    <input name="lE" value="ok" type="checkbox"  id="lEID">
    <label  for="lEID">Luva Plastica Estéril Transparente </label><br>
    <input name="MascI" value="ok" type="checkbox"  id="MascIID">
    <label  for="MascIID">Máscara de inalação Adulto + Extensão </label><br>
    <input name="MascDesck" value="ok" type="checkbox"  id="MascDesckID">
    <label  for="MascDesckID">Máscara Descartável (2)</label><br>
    <input name="Masc95" value="ok" type="checkbox"  id="Masc95ID">
    <label  for="Masc95ID">Máscara N95</label><br>
    <input name="MascVenturi" value="ok" type="checkbox"  id="MascVenturiID">
    <label  for="MascVenturiID">Máscara Venturi 50% Adulto + Extensão</label><br>
    <input name="Micro" value="ok" type="checkbox"  id="MicroID">
    <label  for="MicroID">Micropore</label><br>
    <input name="scalp23" value="ok" type="checkbox"  id="scalp23ID">
    <label  for="scalp23ID">Scalp 23</label><br>
    <input name="scalp25" value="ok" type="checkbox"  id="scalp25ID">
    <label  for="scalp25ID">Scalp 25</label><br>
    <input name="seringa10" value="ok" type="checkbox"  id="seringa10ID">
    <label  for="seringa10ID">Seringa 10ML</label><br>
    <input name="seringa20" value="ok" type="checkbox"  id="seringa20ID">
    <label  for="seringa20ID">Seringa 20ML</label><br>
    <input name="sA8" value="ok" type="checkbox"  id="sA8ID">
    <label  for="sA8ID">Sonda de aspiração Nº08 Com Válvula</label><br>
    <input name="sA10" value="ok" type="checkbox"  id="sA10ID">
    <label  for="sA10ID">Sonda de aspiração Nº10 Com Válvula</label><br>
    <input name="sA12" value="ok" type="checkbox"  id="sA12ID">
    <label  for="sA12ID">Sonda de aspiração Nº12 Com Válvula</label><br>
    <input name="sA14" value="ok" type="checkbox"  id="sA14ID">
    <label  for="sA14ID">Sonda de aspiração Nº14 Com Válvula</label><br>
    <input name="swabID" value="ok" type="checkbox"  id="swabID">
    <label  for="swab">SWAB Alcóol</label><br>
    <input name="grav" value="ok" type="checkbox"  id="gravID">
    <label  for="gravID">Equip Gravitacional (tutodrop)</label><br>
    <input name="sf09" value="ok" type="checkbox"  id="sf09ID">
    <label  for="sf09ID">Soro Fisiologico 0.9% - 500ML</label><br>
    <input name="Cguedel" value="ok" type="checkbox"  id="CguedelD">
    <label  for="CguedelID">Cânula de guedel</label><br>
    <input name="nasoGastrica10" value="ok" type="checkbox"  id="nasoGastrica10ID">
    <label  for="nasoGastrica10ID">Sonda Nasogástrica Nº010</label><br>
    <input name="nasoGastrica12" value="ok" type="checkbox"  id="nasoGastrica12ID">
    <label  for="nasoGastrica12ID">Sonda Nasogástrica Nº12</label><br>
    
  

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