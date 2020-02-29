<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist Viatura Básica</title>
  </head>
  <body>

<div class="container">
  <div class="jumbotron">
    <h3 class="text-center">Checklist Viatura Básica</h3> 
    <p>Insira os dados abaixo:</p> 
    <form action="enviaremail.php" method="post" name="condutor">
    <input type="hidden" name="checklistbasica" value="1">
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
    <input name="maca" value="ok" type="checkbox"  id="macaId">
    <label  for="macaId">Maca com Roda</label><br>
    <input name="ambuA" value="ok" type="checkbox"  id="ambuAID">
    <label  for="ambuAID">BVM Adulto</label><br>
    <input name="ambuPED" value="ok" type="checkbox"  id="ambuPEDID">
    <label  for="ambuPEDID">BVM PED</label><br>
    <input name="ssvv" value="ok" type="checkbox"  id="ssvvID">
    <label  for="ssvvID">Bolsa SSVV</label><br>
    <input name="cadeira" value="ok" type="checkbox"  id="cadeiraID">
    <label  for="cadeiraID">Cadeira de Rodas</label><br>
    <input name="chave" value="ok" type="checkbox"  id="chaveID">
    <label  for="chaveID">Chave de Boca</label><br>
    <input name="manometro" value="ok" type="checkbox"  id="manometroID">
    <label  for="manometroID">Manômetro</label><br>
    <input name="fluxL" value="ok" type="checkbox"  id="fluxLID">
    <label  for="fluxLID">Fluxômentro LIFE</label><br>
    <input name="fluxR" value="ok" type="checkbox"  id="fluxRID">
    <label  for="fluxRID">Fluxômentro REDE</label><br>
    <input name="aspi" value="ok" type="checkbox"  id="aspiID">
    <label  for="aspiID">Frasco Aspiração</label><br>
    <input name="kitHig" value="ok" type="checkbox"  id="kitHigID">
    <label  for="kitHigID">Kit higienização</label><br>
    <input name="ked" value="ok" type="checkbox"  id="kedID">
    <label  for="kedID">KED</label><br>
    <input name="lona" value="ok" type="checkbox"  id="lonaID">
    <label  for="lonaID">Lona de Transporte</label><br>
    <input name="neb" value="ok" type="checkbox"  id="nebID">
    <label  for="nebID">Nebulizador + Circuito</label><br>
    <label for="o2gId">Cilindo O² Grande:</label>
    <input required type="number" class="form-control" name="o2g" id="o2gId"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2grId">Cilindo O² Grande Reserva:</label>
    <input required type="number" class="form-control" name="o2gr" id="o2grId"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2lId">Cilindo O² LIFE:</label>
    <input required type="number" class="form-control" name="o2l" id="o2lId"  placeholder="Informe a quantidade de libras"><br>
    <label for="o2lrId">Cilindo O² LIFE Reserva:</label>
    <input required type="number" class="form-control" name="o2lr" id="o2lrId"  placeholder="Informe a quantidade de libras"><br>
    <input name="prancha" value="ok" type="checkbox"  id="pranchaID">
    <label  for="pranchaID">Prancha Rigida + Tirante</label><br>
    <input name="headB" value="ok" type="checkbox"  id="headBID">
    <label  for="headBID">Head Block</label><br>
    <input name="umil" value="ok" type="checkbox"  id="umilID">
    <label  for="umilID">Umidificador LIFE</label><br>
    <input name="umir" value="ok" type="checkbox"  id="umirID">
    <label  for="umirID">Umidificador REDE</label><br>
           
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