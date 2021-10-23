<?php 
session_start();
include '../class/conexao.php';
include "../model/FichaMed.php"; 
include "../controler/cFichaMed.php";  
 


$salvardocmed = new ControlerFichaMed();
$ficha= $_GET['cd_ficha'];
$salvardocmed->salvardocmed($ficha);

 ?>

 <script type="text/javascript">
 	
 // window.location.replace('../index.php?page=lista_atendido_enf');
   

 </script>