<?php 
session_start();
include "../class/conexao.php";
include "../model/FichaMed.php";
include "../controler/cFichaMed.php"; 
include  "../class/Seguranca.php";

$documento=new ControlerFichaMed();
$atd=$_POST['atendimento'];
$condutaP=$_POST['conduta_med'];
$queixaP=$_POST['queixa_med'];
$motivo_altaP=$_POST['motivo_alta'];
$aceiteprotP=$_POST['aceite_protocolo'];
$ficha=(isset($_POST['ficha']))?$_POST['ficha']:null;

$documento->setConduta($condutaP);
$documento->setQueixa($queixaP);
$documento->setMotivoAlta($motivo_altaP);
$documento->setAtendimento($atd);
$documento->setAceite($aceiteprotP);
if ($ficha) {
	

$documento->editfichamed($ficha);
} else {
	
$documento->cadprontmed();
}



?>
