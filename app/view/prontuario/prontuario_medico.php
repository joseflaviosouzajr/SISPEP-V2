<?php 
include "../../class/conexao.php";
include "../../model/FichaMed.php";
include "../../controler/cFichaMed.php";  

$documento=new ControlerFichaMed();
$ficha= (isset($_GET['cd_ficha']))?$_GET['cd_ficha']:null ;
$infoficha=null;
if ($ficha) {
	$atd= (isset($_GET['atd']))?$_GET['atd']:null ;
  $infoficha=$documento->dadosfichamed($atd,$ficha);
} else {
	$atd= (isset($_POST['atd']))?$_POST['atd']:null ;

}


 if($atd){
  $dadoatd = $documento->dadoatdmed(intval($atd));
    
}

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



	<div  class= "container align-self-center"  style="margin-top: 40px" >
           <div>
           <?php 
           if($atd){

             echo "<h6>Nome: ".$dadoatd->nome."</h6> ";
             echo "<h6>Atendimento: ".$dadoatd->cd_atendimento."</h6> ";
             echo "<h6>Data de Nascimento: ".$dadoatd->dt_nascimento."</h6> ";

             if($dadoatd->protocolo) {
               echo "<h6>Protocolo: ".$dadoatd->protocolo."</h6> ";
             }
          
             echo "<a class='btn btn-success' target='_blank' href='view/prontuario/visualizarcla.php?atendimento=".$dadoatd->cd_atendimento."' > Prontuario Enf </a>";

           }
         
		 ?>
</div>
         
		<h4>FICHA DE EVOLUCAO MEDICA DA URGENCIA </h4>


		<form id="prontmed" method="post" style="margin-top: 20px;"> 
         <input type="hidden" name="atendimento" <?php echo "value='".$atd."'"; ?> >
           <input type="hidden" name="ficha" <?php if($infoficha)
           { echo "value='".$infoficha->cd_ficha."'"; } ?> >

               <?php if($dadoatd->protocolo){  ?>
     <div class="form-group">
            	<label >ACEITE PROTOCOLO</label>
				<select class="form-control"  required=""   name="aceite_protocolo"    >
					<option  value=''>Selecione a Resposta</option>
					<option   <?php   if($ficha) {  if($infoficha->aceite_protocolo==1){ echo "selected='selected'"; } } ?> value="1">SIM</option>
					<option <?php   if($ficha) {  if($infoficha->aceite_protocolo==0){ echo "selected='selected'"; } } ?>value="0">NAO</option>
								</select>
		</div>
   <?php  }?>
			<div class="form-group">
				<label >QUEIXA PRINCIPAL</label>
				<textarea  class="form-control"  name="queixa_med" placeholder="Digite a queixa principal do paciente"  autocomplete="off"  required="">
				<?php if ($ficha) {
					echo $infoficha->ds_queixa;
				} ?>	
				</textarea>  
			</div>

			<div class="form-group">
				<label >CONDUTA</label>
				<textarea  class="form-control"  name="conduta_med" placeholder="Digite a conduta medica"  autocomplete="off"  required="">
					<?php if ($ficha) {
					echo $infoficha->ds_conduta;
				} ?>	
				</textarea>  
			</div>

			<div class="form-group">

				<label >MOTIVO DA ALTA</label>
				<select class="form-control"  required=""   name="motivo_alta"  placeholder="Escolha o Motivo da Alta"  >
					<option value=''>Selecione  o Motivo da Alta</option>
					<option  <?php   if($ficha) {  if($infoficha->motivo_alta==1){ echo "selected='selected'"; } } ?> value="1">Melhorada</option>
					<option <?php   if($ficha) {  if($infoficha->motivo_alta==2){ echo "selected='selected'"; } } ?> value="2">Internacao Hospitalar</option>
					<option <?php   if($ficha) {  if($infoficha->motivo_alta==3){ echo "selected='selected'"; } } ?> value="3">Obito</option>
					<option <?php   if($ficha) {  if($infoficha->motivo_alta==4){ echo "selected='selected'"; } } ?> value="4">Evasao</option>
				</select>
            
			</div>



			<div style="text-align: right;">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		


		</form>
		

	</div>



	

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php  if ($dadoatd->protocolo && $ficha == null) { ?> 

   
   <script type="text/javascript">
    var protocolo= "<?php echo $dadoatd->protocolo; ?>";
    alert("Esse Paciente Possui Protocolo de " + protocolo + "!");
    
	 </script>


  
  <?php } elseif ($dadoatd->protocolo && ($ficha != null && $infoficha->aceite_protocolo == 1)) {?>
  	<script type="text/javascript">
    var protocolo= "<?php echo $dadoatd->protocolo; ?>";
    alert("Esse Paciente Possui Protocolo de " + protocolo + "!");
    
	 </script>
 <?php } ?>
	<script type="text/javascript">

  $('#prontmed').submit(function(e){
  $.ajax({
  	type:'POST',
  	url:'action/cadprontmed.php',
  	data:$(this).serialize(),
  	success:function(data){
  		$('#conteudo').load('view/totem/lista_espera_med.php');
  	}
  });
  return false;
  });

	</script>

</body>
</html>