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
    <h3 class="text-center">Checklist Mochila Verde Escuro</h3> 
    <p>Insira os dados abaixo:</p>
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilaverde" value="1">
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
    <h4 class="text-center">Checar os intens abaixo:</h4>
    <div class="form-group form-check">
    <input id="agulhaID" name="agulha" value="ok" type="checkbox">
    <label for="agulhaID">Agulha de Aspiração 40X12</label><br>
    <input id="campoFenestradoID" name="campoFenestrado" value="ok" type="checkbox">
    <label for="campoFenestradoID">Campo fenestrado</label><br>
    <input id="cateteradultID" name="cateteradult" value="ok" type="checkbox">
    <label for="cateteradultID">Cateter Mono Lume Adulto 16GA</label><br>
    <input id="cateterinfantID" name="cateterinfant" value="ok" type="checkbox">
    <label for="cateterinfantID">Cateter Mono Lume infantil 18GA</label><br>
    <input id="gazeID" name="gaze" value="ok" type="checkbox">
    <label for="gazeID">Compressa de Gaze</label><br>
    <input id="clorexID" name="clorex" value="ok" type="checkbox">
    <label for="clorexID">Clorex Aquosa</label><br>
    <input id="drenoID" name="dreno" value="ok" type="checkbox">
    <label for="drenoID">Dreno de Torax</label><br>
    <input id="esparadrapoID" name="esparadrapo" value="ok" type="checkbox">
    <label for="esparadrapoID">Esparadrapo</label><br>
    <input id="kitCirID" name="kitCir" value="ok" type="checkbox">
    <label for="kitCirID">Kit peq. Cirurgia</label><br>
    <input id="kitSutID" name="kitSut" value="ok" type="checkbox">
    <label for="kitSutID">Kit Sutura</label><br>
    <input id="luva8ID" name="luva8" value="ok" type="checkbox">
    <label for="luva8ID">Luvas esteril 8,0</label><br>
    <input id="luva8.5ID" name="luva8.5" value="ok" type="checkbox">  
    <label for="luva8.5ID">Luvas esteril 8,5</label><br>
    <input id="seringaID" name="seringa" value="ok" type="checkbox">
    <label for="seringaID">Seringa 20ML</label><br>
    <input id="sf10ID" name="sf10" value="ok" type="checkbox">
    <label for="sf10ID">Soro Fisiológico 0.9% 10ML</label><br>
    
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