<?php 
session_start();
include '../../class/Seguranca.php';
include "../../class/conexao.php";
include "../../model/Classificacao.php";
include "../../controler/cClassificacao.php";  
include "../../model/Carteira.php";
include "../../controler/cCarteira.php"; 

$carteirapct = new ControlerCarteira();

$documento=new ControlerDocEnf();

$nr_carteira= (isset($_GET['nr_carteira']))?$_GET['nr_carteira']:null ;
$nr_senha = (isset($_GET['nr_senha']))?$_GET['nr_senha']:null ;

$atd= (isset($_GET['atd']))?$_GET['atd']:null ;
$dadospaciente=null;
$prontuariopaciente=null;
$seguranca= new Seguranca();
$seguranca->validaSessao();
//var_dump($nr_senha);

if (isset($nr_carteira)) {

	$carteirapct->setCarteira($nr_carteira);

	$existecarteira = $carteirapct->localizarCarteira();

	if ($existecarteira!=0) {
		$documento->setPaciente($existecarteira);
		$resposta= $documento->getProntuarioPaciente();

		if ($resposta==1) {

			$dadospaciente=$documento->getDadosPaciente();

		} else {

			echo '<script>

			if(window.confirm("ESSE POSSUI UM PRONTUARIO ATIVO")){

				} else {

				}

				</script>';
			}
		} else {

			echo '<script>

			if(window.confirm("ESSE CARTEIRA NAO EXISTE")){

				} else {

				}

				</script>';

			}

		} 

		if (isset($atd)) {

			$documento->setAtendimento($atd);

			$prontuariopaciente=$documento->buscarprontenf();

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

				<div class='text-center'>   <h4>FICHA DE CLASSIFICACAO DA ENFERMAGEM </h4> </div>
				<?php 
				if ($atd) {
					echo '<form action="../../action/cad_pront_enf.php" method="post" style="margin-top: 20px;">';
				} else {
					echo '<form action="action/cad_pront_enf.php" method="post" style="margin-top: 20px;">';	
				}
				
				 ?>
				 
					<input type="hidden" name="atendimento" <?php if($prontuariopaciente){ echo "value='".$prontuariopaciente->cd_atendimento."' "; } ?> >
					<div class="form-group">
					<input type="hidden" name="totem" id="totem" <?php if($nr_senha){ echo "value='".$nr_senha."' "; } ?> >
					<div class="form-group">
						<strong > DADOS DO PACIENTE  </strong> 
					</div>

					<div class="form-group">
						<label > <strong> CARTEIRA </strong>  </label>

						<input <?php if($dadospaciente){ echo "value='".$nr_carteira."' "; } else if ($prontuariopaciente) 
						{ echo "value='".$prontuariopaciente->nr_carteira."' disabled "; } ?> type="text" class="form-control"  name="nr_carteira" id="nr_carteira" > 


						<input <?php if($dadospaciente){ echo "value='".$dadospaciente->cd_paciente."' "; } else if ($prontuariopaciente) { echo "value='".$prontuariopaciente->cd_paciente."' "; }?> type="hidden" class="form-control"  name="cd_paciente"> 
						<span class="input-group-text" id="pesquisar"> <i class="fas fa-search"></i> </span>

					</div>

					<div class="form-group">
						<label >NOME</label>
						<input  <?php if($dadospaciente){ echo "value='".$dadospaciente->nome."' disabled"; }  else if ($prontuariopaciente) { echo "value='".$prontuariopaciente->nome."' disabled "; }?>  type="text" class="form-control"  name="nm_paciente" >
					</div>

					<div class="form-group">
						<label >DT NASCIMENTO</label>
						<input  <?php if($dadospaciente){ echo "value='".$dadospaciente->dt_nascimento."' disabled "; } else if ($prontuariopaciente) { echo "value='".$prontuariopaciente->dt_nascimento."' disabled  "; } ?>   type="text" class="form-control"  name="dt_nascimento"  autocomplete="off" >
					</div>

					<div class="form-group">
						<label > DADOS CLINICOS  </label> </label></label>
					</div>

					<div class="form-group">
						<label >TEMPERATURA</label>
						<input <?php if($prontuariopaciente){ echo "value='".$prontuariopaciente->temp."'"; } ?> 
						type="text" class="form-control" name="TEMP"  placeholder="Digite a Temperatura"  required=""  autocomplete="off"  >
					</div>

					<div class="form-group">
						<label >PAS</label>
						<input <?php if($prontuariopaciente){ echo "value='".$prontuariopaciente->pas."'"; } ?> type="text" class="form-control" name="PAS"  placeholder="Digite a PAS" required=""  autocomplete="off" >
					</div>

					<div class="form-group">
						<label >PAD</label>
						<input <?php if($prontuariopaciente){ echo "value='".$prontuariopaciente->pad."'"; } ?>  type="text" class="form-control" name="PAD"  placeholder="Digite a PAd" required=""  autocomplete="off">
					</div>

					<div class="form-group">
						<label >SAT</label>
						<input <?php if($prontuariopaciente){ echo "value='".$prontuariopaciente->sat."'"; } ?>  type="text" class="form-control" name="SAT"  placeholder="Digite a SAT" required=""  autocomplete="off">
					</div>

					<div class="form-group">		         	
						<input 
						<?php if($prontuariopaciente) {  if($prontuariopaciente->has){ echo "checked='checked'"; } } ?> 
						class="form-check-input"   name="HAS"  type="checkbox" value="1" id="defaultCheck1">
						<label class="form-check-label" for="defaultCheck1">HAS</label>
					</div>
					<div class="form-group">		         	
						<input <?php  if($prontuariopaciente) { if($prontuariopaciente->diabetes){ echo "checked='checked'"; }} ?> 
						class="form-check-input"  name="DIAB"  type="checkbox" value="1" id="defaultCheck1">
						<label class="form-check-label" for="defaultCheck1">DIABETES</label>
					</div>

					<div class="form-group">
						<label >EVOLUCAO</label>
						<textarea  class="form-control"  name="evolucao" placeholder="Digite a Evolucao do paciente"  autocomplete="off"  required="">
							<?php if($prontuariopaciente){ echo $prontuariopaciente->ds_evolucao; } ?>
						</textarea>  
					</div>

					<div class="form-group">

						<label >CLASSIFICACAO</label>
						<select class="form-control"  required=""   name="CLARISCO"  placeholder="Escolha a Calssificacao do paciente"  >
							<option value=''>Selecione a Categoria</option>
							<option <?php   if($prontuariopaciente) {  if($prontuariopaciente->classificacao=='VERMELHO'){ echo "selected='selected'"; } } ?>  value="VERMELHO">VERMELHO</option>
							<option <?php  if($prontuariopaciente) { if($prontuariopaciente->classificacao=='VERDE'){ echo "selected='selected'"; }}  ?>  value="VERDE">VERDE</option>
							<option <?php  if($prontuariopaciente) { if($prontuariopaciente->classificacao=='AMARELO'){ echo "selected='selected'"; }}  ?>  value="AMARELO">AMARELO</option>
							<option <?php   if($prontuariopaciente) { if($prontuariopaciente->classificacao=='AZUL'){ echo "selected='selected'"; }}  ?>  value="AZUL">AZUL</option>
						</select>

					</div>

					<div style="text-align: right;">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				
				</form>

			</div>

			<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			<script type="text/javascript">

				$('#pesquisar').click(function(e)
				{
					var nr_carteira = $('#nr_carteira').val();
					var senha_totem = $('#totem').val();

					if(nr_carteira != '' && senha_totem != '') {
						$('#conteudo').load('view/prontuario/prontuario.php?nr_carteira='+nr_carteira+'&nr_senha='+senha_totem); 
					} else {
						$('#conteudo').load('view/prontuario/prontuario.php?nr_carteira='+nr_carteira);
					}
				});
			</script>
		</body>
		</html>