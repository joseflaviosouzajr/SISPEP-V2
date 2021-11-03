<?php 

session_start();
include 'class/Seguranca.php';
$seguranca= new Seguranca();
$seguranca->validaSessao();
$conselho=$_SESSION['conselho'];
$nm_usuario = $_SESSION['nome'];
$pagina=(isset($_GET['page']))?$_GET['page']:null;
$prioridade=(isset($_GET['nr_senha']))?$_GET['nr_senha']:null;

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <meta charset="utf-8">
  <title></title>
</head>
<body>
   <div class="container-fluid"> 
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SISPEP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
      </button>
      <?php if($conselho == 'Coren') { ?>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" style="width: 100%">
              <li class="nav-item active">
                <a id='list-classificacao' data-pag="totem/lista_espera_enf.php" class="nav-link navegacao-link" href="#">Lista Para Classificacao<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
                <a id='prontuario-enf' data-pag="prontuario/prontuario.php" class="nav-link navegacao-link" href="#">Prontuario Enf</a>
            </li>
            <li class="nav-item">
                <a id='pacientes-classificados' data-pag="prontuario/lista_atendido_enf.php" class="nav-link navegacao-link" href="#">Pacientes Classificados</a>
            </li>
            <li class="nav-item dropdown" style="margin-left: 55%">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user" ></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" disabled href="#"><strong><?php echo $nm_usuario; ?></strong></a>
                  <hr class="dropdown-divider">                  
                  <a class="dropdown-item" href="action/logout.php">sair</a>
              </div>
          </li>
      </ul>
  </div>
<?php } elseif($conselho == 'Cremepe') { ?>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav" style="width: 100%">
          <li class="nav-item active">
            <a  data-pag="totem/lista_espera_med.php" class="nav-link navegacao-link" href="#">Lista Espera Med<span class="sr-only">(Página atual)</span></a>
        </li>
          <!-- <li class="nav-item">
            <a  data-pag="prontuario/prontuario_medico.php" class="nav-link navegacao-link" href="#">Ficha Médica</a>
        </li> -->
        <li class="nav-item">
            <a  data-pag="prontuario/lista_atendido_med.php" class="nav-link navegacao-link" href="#">Pacientes Atendidos</a>
        </li>
        <li class="nav-item dropdown" style="margin-left: 55%">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user" ></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" disabled href="#"><strong><?php echo $nm_usuario; ?></strong></a>
              <hr class="dropdown-divider">              
              <a class="dropdown-item" href="action/logout.php">sair</a>
          </div>
      </li>
  </ul>
</div>

<?php } elseif($conselho == 'colab') { ?>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav" style="width: 100%">
        <li class="nav-item active">
          <a id='list-coleta' data-pag="lab/lista_coleta_lab.php" class="nav-link navegacao-link" href="#">Lista Para Coleta<span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item dropdown" style="margin-left: 55%">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user" ></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" disabled href="#"><strong><?php echo $nm_usuario; ?></strong></a>
            <hr class="dropdown-divider">            
            <a class="dropdown-item" href="action/logout.php">sair</a>
        </div>
    </li>
</ul>
</div>
<?php } ?>
</nav>

<div id="conteudo"> </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
    <?php 
    if($conselho == 'Coren') {
        if ($pagina == 'prontenf') {
            echo "$('#conteudo').load('view/prontuario/prontuario.php')";
        } elseif ($pagina == 'lista_atendido_enf') {
            echo "$('#conteudo').load('view/prontuario/lista_atendido_enf.php')";
        } else {
            echo "$('#conteudo').load('view/totem/lista_espera_enf.php')";
        }
    } elseif($conselho == 'colab') {
        echo "$('#conteudo').load('view/lab/lista_coleta_lab.php')";
    } elseif($conselho == 'Cremepe') {
        if ($pagina == 'lista_atendido_med') {
            echo "$('#conteudo').load('view/prontuario/lista_atendido_med.php')";
        } else {
            echo "$('#conteudo').load('view/totem/lista_espera_med.php')";
        }
    } else {
        echo "$('#conteudo').load('')";
    }

?>
});
  $('.navegacao-link').click(function(e){
    var pag = $(this).data('pag');
    console.log();
    $('#conteudo').load('view/'+pag);
});


</script>
</body>
</html>