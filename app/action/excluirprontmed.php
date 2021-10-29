<?php 

include '../class/conexao.php';
include "../model/FichaMed.php"; 
include "../controler/cFichaMed.php";  


$excluirdocmed = new ControlerFichaMed();
$ficha= $_GET['cd_ficha'];
//$excluirdocmed->setFicha($ficha);

$excluirdocmed->excluirdocmed($ficha);



 ?>
    
 <script type="text/javascript">
 	
  window.location.replace('../index.php?page=lista_atendido_med');
   

 </script>