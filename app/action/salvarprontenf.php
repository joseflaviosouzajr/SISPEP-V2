<?php 
session_start();
include '../class/conexao.php';
include "../model/classificacao.php"; 
include "../controler/cClassificacao.php";  
include "../model/Lab.php"; 
include "../controler/cLab.php";  

$lab=new ControlerLab();

$salvardocenf = new ControlerDocEnf();
$atd= $_GET['atd'];
$salvardocenf->setAtendimento($atd);

$salvardocenf->salvardocenf();


$lab->setAtendimento($atd);

$lab->setColetado('N');

$lab->inserirPedidoLab();


 ?>

 <script type="text/javascript">
 	
  window.location.replace('../index.php?page=lista_atendido_enf');
   

 </script>