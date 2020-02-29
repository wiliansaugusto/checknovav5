<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist Condutor Final de Plantão</title>
  </head>
  <body>




<div class="container">
    <div class="rol">
        <div class="col">
        
        </div>

        <div class="col">
 
        <form action="enviaremail.php" method="post" name="formulario">
           <div class="card">    
           <div class="jumbotron">
                   <div class="form-group" >
                   <h1 class="text-center">Checklist Condutor Fechamento</h1>
                   <input type="hidden" name="condutorfim" value="1">

                <label for="nomeId">Nome:</label>
                <input required type="text" class="form-control" name="nome" id="nomeId" placeholder="Seu Nome"><br>
                <label for="vtrId">VTR</label>
                <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a VTR"><br>
                <label for="abast">Abastecimento</label>
                <select name="abast2" class="form-control" id="abast" require><br>
                <option >Cheio</option>
                <option>1/4</option>
                <option>Meio Tanque</option>
                <option>3/4</option>
                <option>Reserva</option>
                </select>           
               </div>
                       
            
           
                <div class="card-body">
                 <h2 class="card-title">Checklist fechamento</h2><br>
                 <h5>Abastecimento</h5><br>
                 <label for="num_talao">Numero do Talão Abastecimento</label>
                 <input required type="number" class="form-control" name="num_talao" id="num_talao" placeholder="Informe o numero do Talão"><br>
                 <label for="qtd_litros">Quantidade de Litros Abastecido</label>
                 <input required type="text" class="form-control" name="qtd_litros" id="qtd_litros" placeholder="Informe quantos litros foram Abastecidos"><br>
                 <h5>Encerramento de Plantão</h5>
                 <label for="km_final">Informe o Km do Final do Plantão</label>
                 <input required type="number" class="form-control" name="km_final" id="km_final" placeholder="informe o KM final"><br>
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
                    </div>
                </div>
                <label for="exampleFormControlTextarea1">Observações:</label><br><br>
                <textarea name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                   
</form>
     </div>
    </div>

    <?php include ('pe.php')?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>