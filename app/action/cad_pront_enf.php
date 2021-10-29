<?php 
session_start();
include "../class/conexao.php";
include "../model/classificacao.php";
include "../controler/cClassificacao.php"; 
include  "../class/Seguranca.php";

$documento=new ControlerDocEnf();
$atd=$_POST['atendimento'];
$id_pacienteP=$_POST['cd_paciente'];
$nr_carteiraP=$_POST['nr_carteira'];
$tempP=$_POST['TEMP'];
$pasP=$_POST['PAS'];
$padP=$_POST['PAD'];
$satP=$_POST['SAT'];
$hasP= (isset($_POST['HAS'])) ? $_POST['HAS'] : 0 ;
$diabP=(isset($_POST['DIAB'])) ? $_POST['DIAB'] : 0 ;
$evolucaoP=$_POST['evolucao'];
$clas_riscoP=$_POST['CLARISCO'];
$totemP=(isset($_POST['totem'])) ? $_POST['totem'] : 0 ;
$protocoloP=null;
$contsepse=0;





if (intval($tempP)  > 38  ||   intval($tempP) < 36 ) {

 $contsepse+=1;

}

if (intval($pasP)  >14  ) {

 $contsepse+=1;

}


if (intval($padP) <7  ) {

 $contsepse+=1;

}


if (intval($satP) <90 ) {

 $contsepse+=1;

}


if ($clas_riscoP != 'AZUL'  &&  $contsepse>=2) {

  $protocoloP='SEPSE';



} elseif ($clas_riscoP == 'AZUL') {

 $protocoloP='COVID-19';
}




$documento->setPaciente($id_pacienteP);
$documento->setTemp($tempP);
$documento->setPas($pasP);
$documento->setPad($padP);
$documento->setSat($satP);
$documento->setEvolucao($evolucaoP);
$documento->setHas(intval($hasP));
$documento->setDiabetes(intval($diabP));
$documento->setClassificacao($clas_riscoP);
$documento->setProtocolo($protocoloP);

if ($atd!='') {

  $documento->setAtendimento($atd);
  $documento->editclassificacaoenf();
}
else {
  
    $documento->setTotem($totemP);
    $documento->cadastrarClassficacaoEnf();   
}


?>

<script type="text/javascript">
  
<?php if ($atd!='') { ?>
  window.location.replace('../index.php?page=lista_atendido_enf');

<?php } else { ?>
  window.location.replace('../index.php');
<?php } ?>


</script>