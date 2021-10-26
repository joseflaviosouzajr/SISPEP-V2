<?php 
session_start();
include '../../class/Seguranca.php';
include "../../class/conexao.php";
include "../../model/Classificacao.php";
include "../../controler/cClassificacao.php";  


$documento=new ControlerDocEnf();



$atd= (isset($_GET['atendimento']))?$_GET['atendimento']:null ;
$seguranca= new Seguranca();
$seguranca->validaSessao();

$documento->setAtendimento($atd);

$prontuariopaciente=$documento->visualizarcla();



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class= "container-fluid align-self-center"  style="margin-top: 40px" >

		<div class='text-center'>   <h4>FICHA DE CLASSIFICACAO DA ENFERMAGEM </h4> </div>



		<div class="form-group">
			<strong > DADOS DO PACIENTE  </strong> 
		</div>

		<div class="form-group">
			<label > <strong> ATENDIMENTO: </strong>  </label>


             <?php echo "<h6> ".$prontuariopaciente->cd_atendimento."</h6>"; ?>



		</div>

		<div class="form-group">
			<label >NOME:</label>

             <?php echo "<h6> ".$prontuariopaciente->paciente."</h6>"; ?>

		</div>

		<div class="form-group">
			<label >DT NASCIMENTO:</label>

			<?php echo "<h6> ".$prontuariopaciente->dt_nascimento."</h6>"; ?>

		</div>

		<div class="form-group">
			<label > DADOS CLINICOS  </label> </label></label>
		</div>

		<div class="form-group">
			<label >TEMPERATURA:</label>
			<?php echo "<h6> ".$prontuariopaciente->temp."</h6>"; ?>

		</div>

		<div class="form-group">
			<label >PAS:</label>
			<?php echo "<h6> ".$prontuariopaciente->pas."</h6>"; ?>

		</div>

		<div class="form-group">
			<label >PAD:</label>

			<?php echo "<h6> ".$prontuariopaciente->pad."</h6>"; ?>

		</div>

		<div class="form-group">
			<label >SAT:</label>
				<?php echo "<h6> ".$prontuariopaciente->sat."</h6>"; ?>

		</div>

		<div class="form-group">		         	


			<label class="form-check-label" for="defaultCheck1">HAS:</label>
			<?php 
                  if ($prontuariopaciente->has==1) {
                  	echo "<h6> HIPERTENSO</h6>";
                  } else {
                  	echo "<h6> NAO HIPERTENSO</h6>";
                  }
                  
                  
			 ?>
		</div>
		<div class="form-group">		         	

			<label class="form-check-label" for="defaultCheck1">DIABETES:</label>
			<?php 
                  if ($prontuariopaciente->diabetes==1) {
                  	echo "<h6> DIABETICO</h6>";
                  } else {
                  	echo "<h6> NAO DIABETICO</h6>";
                  }
                  ?>
		</div>



		<div class="form-group">
			<label >EVOLUCAO:</label>

			<?php echo "<p> ".$prontuariopaciente->ds_evolucao."</p>"; ?>

		</div>

		<div class="form-group">

			<label >CLASSIFICACAO:</label> 
			<br>
<?php 
                  if ($prontuariopaciente->CLALISTA==1) {
                  	echo "<i class='fas fa-circle text-danger' ></i>";
                  } elseif($prontuariopaciente->CLALISTA==2) {
                  		echo "<i class='fas fa-circle text-warning' ></i>";
                  	}
                  		 elseif($prontuariopaciente->CLALISTA==3) {
                  		echo "<i class='fas fa-circle text-success' ></i>";
                  	}
                  		elseif($prontuariopaciente->CLALISTA==4) {
                  		echo "<i class='fas fa-circle text-primary' ></i>";
                  	}
                  
                  ?>

		</div>


		<div class="form-group">

			<label >PROTOCOLO:</label> 
			<br>
<?php 
                  if ($prontuariopaciente->protocolo=='COVID-19') {
                  	echo "<i class='fas fa-lungs-virus text-danger' ></i>";
                  } elseif($prontuariopaciente->protocolo=='SEPSE') {
                  		echo "<i class='fas fa-notes-medical text-warning' ></i>";
                  	} else {

                  		echo "<h6> Sem protocolo</h6>";

                  	}
                  		
                  ?>
                  
		</div>



	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/295172c442.js" crossorigin="anonymous"></script>

</body>
</html>