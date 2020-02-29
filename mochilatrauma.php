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
    <h3 class="text-center">Checklist Mochila de Trauma</h3> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilatrauma" value="1">
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
    <br><h2 class="text-center">Materiais a serem checados</h2><br> 
    <div class="form-group form-check">
    <input name="aCrepe" value="ok" type="checkbox"  id="aCrepeID">
    <label  for="aCrepeID">Atadaura de Crepe 10CM (3)</label><br>
    <input name="aCrepe15" value="ok" type="checkbox"  id="aCrepe15ID">
    <label  for="aCrepe15ID">Atadaura de Crepe 15CM (3)</label><br>
    <input name="aCrepe20" value="ok" type="checkbox"  id="aCrepe20ID">
    <label  for="aCrepe20ID">Atadaura de Crepe 20CM (3)</label><br>
    <input name="bTriangular" value="ok" type="checkbox"  id="bTri">
    <label  for="bTri">Bandagem Triangular</label><br>
    <input name="b22D" value="ok" type="checkbox"  id="b22DID">
    <label  for="b22DID">Bisturi Nº22 descartável</label><br>
    <input name="cAranha" value="ok" type="checkbox"  id="cAranhaId">
    <label  for="cAranhaId">Cinto Aranha p/ Prancha</label><br>
    <input name="cCervical3" value="ok" type="checkbox"  id="cCervical3id">
    <label  for="cCervical3id">Colar Cervical 3 Variações</label><br>
    <input name="cCervicalg" value="ok" type="checkbox"  id="cCervicalgid">
    <label  for="cCervicalgid">Colar Cervical Grande</label><br>
    <input name="cCervicalm" value="ok" type="checkbox"  id="cCervicalmid">
    <label  for="cCervicalmid">Colar Cervical Médio</label><br>
    <input name="cCervicalp" value="ok" type="checkbox"  id="cCervicalpid">
    <label  for="cCervicalpid">Colar Cervical Pequeno</label><br>
    <input name="cCervicalespuma" value="ok" type="checkbox"  id="cCervicaleid">
    <label  for="cCervicaleid">Colar Cervical Espuma</label><br>
    <input name="CompAlg" value="ok" type="checkbox"  id="CompAlgID">
    <label  for="CompAlgID"> Gaze Algodonada 10X15 Estéril (2)</label><br>
    <input name="CompEs" value="ok" type="checkbox"  id="CompEsID">
    <label  for="CompEsID">Compressa Gaze Estéril 7,5CM (6)</label><br>
    <input name="Espatula" value="ok" type="checkbox"  id="EspatulaID">
    <label  for="EspatulaID">Espátula Descartavél(5)</label><br>
    <input name="fita" value="ok" type="checkbox"  id="fitaID">
    <label  for="fitaID">Fita Crepe 19X50 CM</label><br>
    <input name="head" value="ok" type="checkbox"  id="headID">
    <label  for="headID">Imobilizador Lateral de Cabeça</label><br>
    <input name="tirante" value="ok" type="checkbox"  id="tiranteID">
    <label  for="tiranteID">Kit Tirante (3 tirantes)</label><br>
    <input name="luvas" value="ok" type="checkbox"  id="luvasID">
    <label  for="luvasID">Luvas de Procedimentos (20)</label><br>
    <input name="manta" value="ok" type="checkbox"  id="mantaID">
    <label  for="mantaID">Manta Térmica</label><br>
    <input name="sf" value="ok" type="checkbox"  id="sfID">
    <label  for="sfID">Soro Fisiológico 0,9% 100ml (3)</label><br>
    <input name="talagg" value="ok" type="checkbox"  id="talaggID">
    <label  for="talaggID">Tala Imobilização GG - Amarela (2)</label><br>
    <input name="talag" value="ok" type="checkbox"  id="talagID">
    <label  for="talagID">Tala Imobilização G - Verde(2)</label><br>
    <input name="talaM" value="ok" type="checkbox"  id="talaMID">
    <label  for="talaMID">Tala Imobilização M - Laranja(2)</label><br>
    <input name="talap" value="ok" type="checkbox"  id="talapID">
    <label  for="talapID">Tala Imobilização P - Azul</label><br>
    <input name="talapp" value="ok" type="checkbox"  id="talappID">
    <label  for="talappID">Tala Imobilização PP - Rouxa</label><br>
    <input name="tesoura" value="ok" type="checkbox"  id="tesouraID">
    <label  for="tesouraID">Tesoura Ponta Romba</label><br>
    
    
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