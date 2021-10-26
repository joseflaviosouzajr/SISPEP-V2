<?php 


include "../../class/conexao.php";
include "../../model/Lab.php";  
include "../../controler/cLab.php"; 


 //$prioridade2=$_GET['prioridade'];


$atdlistalab = new  ControlerLab();
//$cadastrar->retirarSenha($prioridade2);
//$cadastrar->ultimaSenha();
 //echo $prioridade2;

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title > LISTA DE COLETA  E LAUDOS LABORATORIO </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>   
 

</head>
<body>

	<div  class="container-fluid" > 

    <div class="col-lg-12">

      <table class="table">
          <thead class="bg-success" style="color:white; font-size:12px;">
          <tr>
            <th class='text-center'>ATENDIMENTO</th>
            <th class='text-center'>NOME</th>
            <th class='text-center'>DATA NASCIMENTO</th>
            <!--  <th class='text-center'>DATA</th> -->
            <th class='text-center' >COLETAR</th>
            <th class='text-center' >LAUDAR</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $atdlistalab->listarAtdColeta();
          ?>
        </tbody>
      </table>



    </div>



  </div>




  <!-- Modal -->
  <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">RESULTADO LABORATORIAL - SISPEP</h5>
        </div>
        <div class="modal-body">
          <form id='formResultado'>

            <div class="input-group mb-3">
              <input type="hidden" name="atd" id='atd'>
              <label class="input-group" for="inputGroupSelect01">RESULTADO:</label>
              <select required class="form-select" name='resultado' id="inputGroupSelect01">
                <option selected>SELECIONE O RESULTADO</option>
                <option value="1">Positivo</option>
                <option value="2">Negativo</option>

              </select>
            </div>

            <div class="input-group mb-3">
              
              <label class="input-group" for="valor">Valor de Referencia:</label>
              <input class="form-control"  type="text" name="vlrf" id='valor'>
              
            </div>


            <div class="input-group mb-3">
              
              <label class="input-group" for="obs">Observacao:</label>
                <textarea class="form-control" name='obs' id='obs'> </textarea>
              
            </div>

            <div>    
              <button type="submit" class="btn btn-success">Salvar Resultado</button> 
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  
  <script type="text/javascript">

   $('.modal-resultado').click(function(e){

    $('#modalExemplo').modal('show');
    $('#atd').val($(this).data('atendimento'));
    

  }   );

   $('#formResultado').submit(function(e){

    console.log('aqui');

    $.ajax({
      type:'POST',
      url:'../../action/cadresultadolab.php',
      data:$(this).serialize(),
      success:function(data){
        window.location.href='lista_coleta_lab.php';
       
      }
    });

    return false;

  });

</script>
</body>
</html>



