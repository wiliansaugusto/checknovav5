<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist Condutor Inicio de Plantão</title>
  </head>
  <body>



  <div class="container">
    <div class="rol">
      

        <div class="col">
 
        <form action="enviaremail.php" method="post" name="condutor">
        <input type="hidden" name="condutorInicio" value="1">
           <div class="card">    
           <div class="jumbotron">
                   <div class="form-group" >
                   <h1 class="text-center">Checklist Condutor Inicio de Plantão</h1>

                <label for="nomeId">Nome:</label>
                <input required type="text" class="form-control" name="nome" id="nomeId" placeholder="Seu Nome"><br>
                <label for="vtrId">VTR</label>
                <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a VTR"><br>
                <label for="km">KM </label>
                <input required type="number" name="km" class="form-control" id="km" placeholder="Informe o KM Odometro"><br>
                <input name="controle" value="ok" type="checkbox"  id="controleID">
                <label  for="controleID">Controle do Portão</label><br>
                <label for="abast">Abastecimento</label>
                <select name="abast2" class="form-control" id="abast" require><br>
                <option >Cheio</option>
                <option>1/4</option>
                <option>Meio Tanque</option>
                <option>3/4</option>
                <option>Reserva</option>
                </select>           
               </div>
                <div class="form-group">
                <label for="exampleFormControlSelect2">Horário de Plantão</label>
                <select name="plantao" class="form-control" id="exampleFormControlSelect2" require>
                  <option >Diurno</option>
                  <option>Noturno</option>
                  <option>Evento</option>
                </select>
            </div>
            </div>
            </div>
            <div class="card">
                <div class="jumbotron">
                <div class="form-group form-check">
                    <h2>Mecânica</h2>
                    <br>
                    <input name="oleo" value="ok" type="checkbox"  id="oleoID">
                    <label  for="oleoID">Nivel do Oleo</label><br>
                    <input name="radiador" value="ok" type="checkbox"  id="radiadorid">
                    <label  for="radiadorid">Água do Radiador</label><br>
                    <input name="freio" value="ok" type="checkbox"  id="freioID">
                    <label  for="freioID">Sistema de Freios</label><br>
                     <input name="hidra" value="ok" type="checkbox"  id="hidraID">
                    <label  for="hidraID">Sistema de Hidráulico</label><br>
                    <h2>Funilária</h2><br>
                    <input name="retrovisor" value="ok" type="checkbox"  id="retrovisorID">
                    <label  for="retrovisorID">Retrovisores </label><br>
                    <input name="vidors" value="ok" type="checkbox"  id="vidorsId">
                    <label  for="vidorsId">Vidros</label><br>
                    
                    <input name="capo" value="ok" type="checkbox"  id="capoID">
                    <label  for="capoID">Capo</label><br>
                    <input name="parachoque" value="ok" type="checkbox"  id="parachoqueID">
                    <label  for="parachoqueID">Parachoque Frontal</label><br>
                    <input name="lata_d" value="ok" type="checkbox"  id="lata_dID">
                    <label  for="lata_dID">Lateral Direita</label><br>
                    <input name="estribo" value="ok" type="checkbox"  id="estriboID">
                    <label  for="estriboID">Estribo Direito</label><br>
                    <input name="lata_e" value="ok" type="checkbox"  id="lata_eID">
                    <label  for="lata_eID">Lateral Esquerda</label><br>
                    <input name="lata_T" value="ok" type="checkbox"  id="lata_TID">
                    <label  for="lata_TID">Portas Traseirasa</label><br>
                    <input name="parachoqueT" value="ok" type="checkbox"  id="parachoqueTID">
                    <label  for="parachoqueTID">Parachoque Traseira</label><br><br>
                    <label for="exampleFormControlTextarea1">Observações Lataria:</label><br><br>
                    <textarea name="obsLata"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br><br>
                    <h2>Elétrica</h2><br>
                    <input name="painel" value="ok" type="checkbox"  id="painelId">
                    <label  for="painelId">Instrumentos Painel</label><br>
                    <input name="lanterna" value="ok" type="checkbox"  id="lanternasID">
                    <label  for="lanternasID">Lanternas</label><br>
                    <input name="faraol" value="ok" type="checkbox"  id="farolID">
                    <label  for="farolID">Farol</label><br>
                    <input name="setas" value="ok" type="checkbox"  id="setasID">
                    <label  for="setasID">Setas</label><br>
                    <input name="luzRe" value="ok" type="checkbox"  id="luzReID">
                    <label  for="luzReID">Luz de Ré</label><br>
                    <input name="giroflex" value="ok" type="checkbox"  id="giroflexID">
                    <label  for="giroflexID">Giroflex</label><br>
                    <input name="sirene" value="ok" type="checkbox"  id="sireneID">
                    <label  for="sireneID">Sirene</label><br>
                    <input name="luzeE" value="ok" type="checkbox"  id="luzeEID">
                    <label  for="luzeEID">Luzes de Embarque</label><br>
                    <input name="frontal" value="ok" type="checkbox"  id="frontalID">
                    <label  for="frontalID">Luzes Frontal</label><br>
                    <input name="Laterais" value="ok" type="checkbox"  id="LateraisID">
                    <label  for="LateraisID">Luzes Laterais</label><br>
                    <input name="arCond" value="ok" type="checkbox"  id="arCondID">
                    <label  for="arCondID">Ar Condicionado</label><br>
                    <input name="exaust" value="ok" type="checkbox"  id="exaustID">
                    <label  for="exaustID">Exaustores</label><br><br>
                    <h2>Equipamentos Obrigatórios</h2>
                    <input name="docVTR" value="ok" type="checkbox"  id="docVTRId">
                    <label  for="docVTRId">Documento da VTR</label><br>
                    <input name="extInc" value="ok" type="checkbox"  id="extIncId">
                    <label  for="extIncId">Extintor de incêndio </label><br>
                    <input name="pneu" value="ok" type="checkbox"  id="pneuId">
                    <label  for="pneuId">Calibragem dos penus</label><br>
                    <input name="estepe" value="ok" type="checkbox"  id="estepeId">
                    <label  for="estepeId">Calibragem do Estepes</label><br>
                    <input name="cintosSeg" value="ok" type="checkbox"  id="cintosSegId">
                    <label  for="cintosSegId">Cintos de Segurança</label><br>
                    <input name="botton" value="ok" type="checkbox"  id="bottonId">
                    <label  for="bottonId">Botton</label><br>
                    <h2>Armário de Oxigênio</h2><br>
                    <input name="bo2" value="ok" type="checkbox"  id="bo2Id">
                    <label  for="bo2Id">Armario do Oxigênio</label><br>
                    <input name="chave" value="ok" type="checkbox"  id="chaveID">
                    <label  for="chaveID">Chave de Boca</label><br>
                    <input name="flux" value="ok" type="checkbox"  id="fluxID">
                    <label  for="fluxID">Fluxômetro do Báu</label><br>
                    <input name="mano" value="ok" type="checkbox"  id="manoID">
                    <label  for="manoID">Manômetro</label><br><br>
                    <label for="exampleFormControlTextarea1">Observações Gerais:</label><br><br>
                    <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br>

                </div>
                <div class="card-body">
                 <h5 class="card-title">Limpeza Interna</h5>
                 <select name="limpezaInt" class="form-control" id="exampleFormControlSelect3" require>
                <option >Regular</option>
                <option>Boa</option>
                <option>Pessima</option>
                </select>
                </div>
                <div class="card-body">
                 <h5 class="card-title">Limpeza Externa</h5>
                 <select name="limpezaExt" class="form-control" id="exampleFormControlSelect4" require>
                <option >Regular</option>
                <option>Boa</option>
                <option>Péssima</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                   
</form>
     </div>
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