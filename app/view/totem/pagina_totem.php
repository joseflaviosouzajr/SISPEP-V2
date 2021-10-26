
<?php 
header('Content-type: text/html; charset=utf-8');    
setlocale(LC_ALL, NULL); // limpa com defaults do sistema... não precisa.
// ERRADO, força Windows setlocale(LC_ALL, 'Portuguese_Brazil.1252');
setlocale(LC_ALL, 'pt_BR.utf-8'); // acho mais correto.
?>
<!doctype html>
	<html lang="pt">
	<head>
		<title>TOTEM</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="../cenma/favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="../../../assets/css/style.css">

	</head>
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h1 class="heading-section">RETIRADA DE SENHA - TOTEM</h1>
					</div>
				</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5 mb-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">HOSPITAL DE URGÊNCIA</h3>
						<div class="col-lg-5" style = "margin: 20px auto;">


							<a  href='../../action/retirarsenha.php?prioridade=N'  class="btn btn-primary btn-lg botaoTotem">Senha Normal</a>

						</div>  
						<div class="col-lg-5" style = "margin: 20px auto;"> 

							<a  href='../../action/retirarsenha.php?prioridade=P'  class="btn btn-secondary btn-lg botaoTotem">Senha Prioridade</a>
						</div> 
					</div>
					
				</div>
			</div>
			
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="../../../assets/js/jquery.min.js"></script>
	<script src="../../../assets/js/popper.js"></script>
	<script src="../../../assets/js/bootstrap.min.js"></script>
	<script src="../../../assets/js/main.js"></script>
	
</body>
</html>


