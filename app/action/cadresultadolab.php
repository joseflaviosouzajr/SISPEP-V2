<?php 
include "../class/conexao.php";
include "../model/Lab.php";
include "../controler/cLab.php"; 
include  "../class/Seguranca.php";

$lab=new ControlerLab();

$resultadolab= $_POST['resultado'];
$atd=$_POST['atd'];
$observacao=$_POST['obs'];
$valor_ref=$_POST['vlrf'];



$lab->setResultado($resultadolab);

$lab->setAtendimento($atd);
$lab->setObs($observacao);
$lab->setValorRef($valor_ref);

$lab->resultadoPedidoLab();
?>

 <script type="text/javascript">
     
  window.location.replace('../view/lab/lista_coleta_lab.php');


 </script>