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
  <h3 class="text-center">Checklist Mochila Psicotropicos</h3> 
    <p>Insira os dados abaixo:</p>
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="mochilapsico" value="1">
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
     
    <input type="checkbox" name="Amplicitil" value="OK" id="qtAmplID">    
    <label for="qtAmplID">Amplicitil</label><br>
    
    <input type="checkbox" name="Cetamina" value="OK" id="qtCetaID">    
    <label for="qtCetaID">Cetamina</label><br>
    <input type="checkbox" name="Clorpromatazina" value="OK" id="qtClorID">    
    <label for="qtClorID">Clorpromatazina 25 mg</label><br>

   
    <input type="checkbox" name="Diazepam" value="OK" id="qtDiazID">   
    <label for="qtDiazID">Diazepam 10 mg </label><br>
   
   
    <input type="checkbox" name="Etomidato" value="OK" id="qtEtomidID">    
    <label for="qtEtomidID">Etomidato 2MG</label><br>
   
   
    <input type="checkbox" name="Fenetoina" value="OK" id="qtFeneID">     
    <label for="qtFeneID">Fenetoina Sódica 5 ML (hidantal)</label><br>
    
    <input type="checkbox" name="Fenobarbital" value="OK" id="qtFenoBID">  
    <label for="qtFenoBID">Fenobarbital (Gardenal)  </label><br>
    
   
    <input type="checkbox" name="Fentanil" value="OK" id="qtFentaID">    
    <label for="qtFentaID">Fentanil</label><br>
   
    <input type="checkbox" name="Flumazenil" value="OK" id="qtFlumaID">    
    <label for="qtFlumaID">Flumazenil</label><br>
   
    <input type="checkbox" name="Halopedirol" value="OK" id="qtHaloID">    
    <label for="qtHaloID">Halopedirol</label><br>
   
    <input type="checkbox" name="Midazolam" value="OK" id="qtMidaID">    
    <label for="qtMidaID">Midazolam 5MG</label><br>
   
    <input type="checkbox" name="Morfina" value="OK" id="qtMorfID">    
    <label for="qtMorfID">Morfina 0,2MG</label><br>
   
    <input type="checkbox" name="Naloxona" value="OK" id="qtNaloID">    
    <label for="qtNaloID">Naloxona</label><br>
   
    <input type="checkbox" name="Petidina" value="OK" id="qtPetiID">    
    <label for="qtPetiID">Petidina 50MG</label><br>
   
    <input type="checkbox" name="Tramal" value="OK" id="qtTramalID">    
    <label for="qtTramalID">Tramal</label><br>

    <hr>
   
    <input type="checkbox" name="DiazepamCP" value="OK" id="qtDiazCompID">   
    <label for="qtDiazCompID">Diazepam - Comprimido </label><hr>
    <br>    
    </div> 
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>
         </div>          
    <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>

   </form>
  </div>


    <?php include ('pe.php')?>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-4.4.1.slim.min.js" integrity="sha484-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha484-ApNbgh9B+Y1QKtv4Rn7W4mgPxhU9K/ScQsAP7hUibX49j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha484-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>