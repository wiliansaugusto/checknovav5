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
    <h3 class="text-center">Checklist de Fechamento de Plantao </h3>
    <h3 class="text-center">VTR Básica</h3> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post">
    <input type="hidden" name="fechamentobasica" value="1">
    <div class="form-group">
    <label for="enfId">Enfermagem:</label>
    <input required type="text" class="form-control" name="enfermagem" id="enfId" placeholder="Seu Nome"><br>
    <label for="vtrID">Equipe</label>
    <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a equipe"><br>
    <label for="dateId">Data do Plantão:</label>
    <input required type="date" name="dataPlantao" class="form-control" id="dateId" placeholder="Informe a data do plantão"><br>
    <label for="exampleFormControlSelect2">Horário de Plantão</label>
                <select name="plantao" class="form-control" id="exampleFormControlSelect2" require>
                  <option >Diurno</option>
                  <option>Noturno</option>
                  <option>Evento</option>
                </select>
     
    </div>
    <br><h2 class="text-center">Itens a ser informado a serem checados</h2><br> 

    <label for="lacreRompAmarelaID">Mochila Verde - Lacre Rompido</label>
    <input required type="text" name="lacreRompAmarela" class="form-control" id="lacreRompAmarelaID" placeholder="Informe o numero do lacre Rompido"><br>
    <label for="lacreRompTraumaID">Mochila de Trauma - Lacre Rompido</label>
    <input required type="text" name="lacreRompTrauma" class="form-control" id="lacreRompTraumaID" placeholder="Informe o numero do lacre Rompido"><br>
    
    <label for="exampleFormControlTextarea">Materiais Usados:</label><br><br>
    <textarea name="matUsados"class="form-control" id="exampleFormControlTextarea" rows="10" onfocus placeholder="Campo para informar materiais usados"></textarea><br><br>
     
    <h3>Houve intercorrência no Plantão?</h3>
                 <div class="form-check">
  
                    <input class="form-check-input" type="radio" name="intercorrencia" id="exampleRadios1" value="Sim" >
                    <label class="form-check-label" for="exampleRadios1">
                        SIM
                    </label>
                    </div>
                    <div class="form-check">
                    <input checked class="form-check-input" type="radio" name="intercorrencia" id="exampleRadios2" value="Não">
                    <label class="form-check-label" for="exampleRadios2">
                        NÃO 
                    </label>
    
    </div> <br>
    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
    <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10" onfocus placeholder="Campo para informar a intercorrência do plantão"></textarea><br><br>
                   
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