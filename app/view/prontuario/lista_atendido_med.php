<?php 


 include "../../class/conexao.php";
 include "../../model/FichaMed.php";  
 include "../../controler/cFichaMed.php"; 
 

 //$prioridade2=$_GET['prioridade'];


 $lista_atendido_enf = new ControlerFichaMed();


 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title > LISTA DE ATENDIMENTOS MEDICO </title>


	<link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container-fluid" > 
    <div class="row">

<div class="col-lg-12">
  
  <table class="table">
  <thead class="bg-success" style="color:white; font-size:12px;">
    <tr>
      <th class='text-center'>ATENDIMENTO</th>
      <th class='text-center'>NOME</th>
      <th class='text-center'>DATA DE NASCIMENTO</th>
      <th class='text-center' >CLASSIFICACAO</th>
      <th class='text-center' >PROTOCOLO</th>
      <th class='text-center' >USUARIO</th>
      <th class='text-center' >NR CONSELHO</th>
      <th class='text-center' >DT REGISTRO</th>
       <th class='text-center' >EDITAR</th>
        <th class='text-center' >CONCLUIR</th>
       <th class='text-center' >EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
  <?php 
         $lista_atendido_enf->listarAtendidoMed();
   ?>
  </tbody>
</table>

  

</div>

  </div>

	</div>

      
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 <script src="https://kit.fontawesome.com/295172c442.js" crossorigin="anonymous"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <script type="text/javascript">
   


 </script>
 <script >	

   $('.fa-pen').click(function(e) {
    var url = $(this).data('pag');
    console.log(url);
    $('#conteudo').load(url);
   });

</script>

</body>
</html>



 