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
    <h3 class="text-center">Checklist Mochila Vermelha</h3> 
    <p>Insira os dados abaixo:</p>
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilavermelha" value="1">
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
    <h4 class="alert alert-danger text-center">Checar os intens abaixo:</h4>
    <div class="form-group form-check">
    
    <input id="gazeID" name="compressa" type="checkbox" value="OK" />  
    <label for="gazeID">Compressa Gaze Esteril 7.5 CM (5)</label><br>
    
    <input id="eletroID" name="eletro" type="checkbox" value="OK" /> 
    <label for="eletroID">Eletrodo Adulto (20)</label><br>

    <input id="equipoFID" name="equipoF" type="checkbox" value="OK" /> 
    <label for="equipoFID">Equipo Bomba Infusão (Foto)  </label><br>

    <input id="equipoID" name="equipo" type="checkbox" value="OK"/> 
    <label for="equipoID">Equipo Bomba de Infusão Med (2) </label><br>
    
    <input id="macroGID" name="macroG" type="checkbox" value="OK"/> 
    <label for="macroGID">Equipo Macro-Gotas Inj Lateral AMB (4)</label><br>

    <input id="microGID" name="microG" type="checkbox" value="OK"/> 
    <label for="microGID">Equipo Micro-Gotas </label><br>

    <input id="esparaID" name="espara" type="checkbox" value="OK"/> 
    <label for="esparaID">Esparadrapo 10 CM X 4.5 CM </label><br>
    
    <input id="espatulaID" name="espatula" type="checkbox" value="OK"/> 
    <label for="espatulaID">Espatula Descartavel (3)</label><br>

    <input id="lanternaID" name="lanterna" type="checkbox" value="OK"/> 
    <label for="lanternaID">Lanterna Clinica</label><br>

    <input id="luvaID" name="luva" type="checkbox" value="OK"/> 
    <label for="luvaID">Luvas de Procedimentos Média (20)</label><br>

    <input id="mantaID" name="manta" type="checkbox" value="OK"/> 
    <label for="mantaID">Manta Termica</label><br>

    <input id="microporeID" name="micropore" type="checkbox" value="OK"/> 
    <label for="microporeID">Micropore 25 CM X 10 CM</label><br>

    <input id="otoscopioID" name="otoscopio" type="checkbox" value="OK"/>
    <label for="otoscopioID">Otoscopio</label><br>

    <input id="polifixID" name="polifix" type="checkbox" value="OK"/> 
    <label for="polifixID">Polifix 2 Vias C/ Clamp (2)</label><br>

    <input id="poteCID" name="poteC" type="checkbox" value="OK"/> 
    <label for="poteCID">Pote Coletor 50ML (3)</label><br>

    <input id="ringerID" name="ringer" type="checkbox" value="OK"/>
    <label for="ringerID">Ringer Lactado 500 ML (2)</label><br>

    <input id="sacoLID" name="sacoL" type="checkbox" value="OK"/>   
    <label for="sacoLID">Saco Leitoso 15L (5)</label><br>

    <input id="sf500ID" name="sf500" type="checkbox" value="OK"/> 
    <label for="sf500ID">Soro Fisiológico 0.9% 500ML (2)</label><br>

    <input id="sg500ID" name="sg500" type="checkbox" value="OK"/>  
    <label for="sg500ID">Soro Glicosado 5% 500ML (2)</label><br>

    <input id="termometroID" name="termometro" type="checkbox" value="OK"/> 
    <label for="termometroID">Termometro </label><br>

    
    
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