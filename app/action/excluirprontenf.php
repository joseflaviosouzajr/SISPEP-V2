<?php 

include '../class/conexao.php';
include "../model/classificacao.php"; 
include "../controler/cClassificacao.php";  


$excluirdocenf = new ControlerDocEnf();
$atd= $_GET['atd'];
$excluirdocenf->setAtendimento($atd);

$excluirdocenf->excluirdocenf();



 ?>

 <script type="text/javascript">
 	
  window.location.replace('../index.php?page=lista_atendido_enf');
   

 </script>