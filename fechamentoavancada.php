<?php


?>
<!doctype html>
<html lang="pt-br">
  <head>
  
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha484-Gn5484xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E264XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Checklist Final de Plantão - Avançada</title>
    <script>
    function mostarreceitas(){
            var x = document.getElementById("receita").value;
            var psico = document.getElementById("psico").value;
            var y;
            if(x>0 && psico > 0){
            for (let index = 0; index < x; index++) {
                if(index==0){

               y="<br><label for="+(index+'pac')+">Paciente - "+(index+1)+"</label >"+
                "<input required class='form-control'type='text' name="+(index+'pac')+" id="+(index+'pac')+" placeholder='Informe o nome do paciente'>"+
                "<label for="+(index+'rec')+">Numero do Receituário</label>"+
                "<input required class='form-control' type='text'  name="+(index+'rec')+" id="+(index+'rec')+" placeholder='Informe o numero do receituário'/>"+
                "<label for="+(index+'med')+">Nome do Medico(a)</label>"+
                "<input requiredclass='form-control' type='text' name="+(index+'med')+" id="+(index+'med')+" placeholder='Informe o nome do Médico(a)'>"+
                "<label for="+(index+'rem')+">Informe a medicação usada</label>"+
                "<textarea required class='form-control' name="+(index+'rem')+" id="+(index+'rem')+" cols='30' rows='10' placeholder='Medicação Usada'></textarea><hr>";

                }else{
                    y=y+"<br><label for="+(index+'pac')+">Paciente - "+(index+1)+"</label >"+
                "<input required class='form-control'type='text' name="+(index+'pac')+" id="+(index+'pac')+" placeholder='Informe o nome do paciente'>"+
                "<label for="+(index+'rec')+">Numero do Receituário</label>"+
                "<input required class='form-control' type='text'  name="+(index+'rec')+" id="+(index+'rec')+" placeholder='Informe o numero do receituário'/>"+
                "<label for="+(index+'med')+">Nome do Medico(a)</label>"+
                "<input required class='form-control' type='text' name="+(index+'med')+" id="+(index+'med')+" placeholder='Informe o nome do Médico(a)'>"+
                "<label for="+(index+'rem')+">Informe a medicação usada</label>"+
                "<textarea required  class='form-control' name="+(index+'rem')+" id="+(index+'rem')+" cols='30' rows='10' placeholder='Medicação Usada'></textarea><hr>";

                }
            }
            document.getElementById("demo").innerHTML = y;
            }else{
                
                alert("Confira os dados da Mochila de Psicotropico");
                document.getElementById("demo").innerHTML = "Confira os dados da Mochila de Psicotropico";

            }
    }
    </script>
  </head>
  <body>



  <div class="container">
    <div class="rol">
      

        <div class="col">
 
        <form action="enviaremail.php" method="post" name="condutor">
        <input type="hidden" name="fechamentoavancada" value="1">
           <div class="card">    
           <div class="jumbotron">
                   <div class="form-group" >
                   <h1 class="text-center">Checklist Final de Plantão</h1>

                <label for="nomeId">Nome:</label>
                <input required type="text" class="form-control" name="nome" id="nomeId" placeholder="Seu Nome"><br>
                <label for="vtrId">VTR</label>
                <input required type="text" name="vtr" class="form-control" id="vtrID" placeholder="Informe a VTR"><br>
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect2">Horário de Plantão</label>
                <select name="plantao" class="form-control" id="exampleFormControlSelect2" require>
                  <option >Diurno</option>
                  <option>Noturno</option>
                  <option>Evento</option>
                </select>
                </div>
                <label for="lipeza">Limpeza Realizada</label>
                <select name="lipeza2" class="form-control" id="lipeza" require><br>
                <option>Não Realizada</option>
                <option >Recorrente</option>
                <option>Terminal</option>
                </select>           
              </div>
            </div>          
              <div class="jumbotron">
            <h5 class="text-center">Mochilas usadas durante o plantão</h5><br>
            <ul>
                <li>Anotar o números dos lacres das mochilas usadas</li>
                <li>Nos campos de textos anotar os itens que precisam de reposição</li>
                <li>Atentar para as receitas dos psicotrópicos</li>
                <li>Confirmar os dados dos pacientes, guias, nome e assinatura do médico</li>
                <li>Enviar no término do plantão</li>
            </ul>
            <div class="card"><br>
                <div class="form-group form-check">
                 <label for="Trauma">Mochila de Trauma</label>
                 <input required name="Trauma" id="Trauma"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p for="obsTrauma">Materiais usados:</p>
                <textarea class='form-control' name="obsTrauma" id="obsTrauma" cols="30" rows="10" placeholder="Informe os materiais usados"></textarea>
                </div>
                </div>
                </div>
                <div class="card"><br>
                <div class="form-group form-check">
                 <label for="Rosa">Mochila Rosa</label>
                 <input required name="Rosa" id="Rosa"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p for="obsRosa">Materiais usados:</p>
                <textarea class='form-control' name="obsRosa" id="obsRosa" cols="30" rows="10" placeholder="Informe os materiais usados"></textarea>
                </div>
                </div>
                </div>
                <div class="card"><br>
                <div class="form-group form-check">
                 <label for="Azul">Mochila Azul</label>
                 <input required name="Azul" id="Azul"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p for="obsAzul">Materiais usados:</p>
                <textarea class='form-control' name="obsAzul" id="obsAzul" cols="30" rows="10" placeholder="Informe os materiais usados"></textarea>
                </div>
                </div>
                </div>
                <div class="card"><br>
                <div class="form-group form-check">
                 <label for="Vermelha">Mochila Vermelha</label>
                 <input required name="Vermelha" id="Vermelha"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p for="obsVermelha">Materiais usados:</p>
                <textarea class='form-control' name="obsVermelha" id="obsVermelha" cols="30" rows="10" placeholder="Informe os materiais usados"></textarea>
                </div>
                </div>
                </div>
                <div class="card" ><br>
                <div class="form-group form-check">
                 <label for="verde">Mochila Verde</label>
                 <input required name="verde" id="verde"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p for="obsverde">Materiais usados:</p>
                <textarea class='md-textarea form-control'name="obsverde" id="obsverde" cols="30" rows="10" placeholder="Informe os materiais usados"></textarea>
                </div>
                </div>
                </div>

                <br>
                <div class="card"><br>
                <div class="form-group form-check">
                 <label for="psico">Mochila Psicotropico</label>
                 <input required name="psico" id="psico"type="text" placeholder="Informe o Nr° do Lacre" class="form-control">
                <div class="card-body">
                <p>informe a quantidade de pacientes atendidos:</p>
                <input required type="number" min='0' name="receita" id="receita">
                
                <button type="button" onclick="mostarreceitas()">Mostrar</button><br>
                <span id="demo"></span>
                </div> <h3>Houve intercorrência no Plantão?</h3>
                 <div class="form-check">
  
                    <input class="form-check-input" type="radio" name="intercorrencia" id="exampleRadios1" value="sim" >
                    <label class="form-check-label" for="exampleRadios1">
                        SIM
                    </label>
                    </div>
                    <div class="form-check">
                    <input checked class="form-check-input" type="radio" name="intercorrencia" id="exampleRadios2" value="não">
                    <label class="form-check-label" for="exampleRadios2">
                        NÃO 
                    </label>
                    </div>
                    <label for="exampleFormControlTextarea1">Observações:</label><br><br>
                <textarea  name="obs"class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea><br>

                </div>
                
                </div>
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