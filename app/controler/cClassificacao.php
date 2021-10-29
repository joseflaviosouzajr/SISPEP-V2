<?php 

/**
 * 
 */
class ControlerDocEnf extends Classificacao
{



 public function getProntuarioPaciente(){

     $con = Conexao::getInstance();
     $query= "SELECT distinct 0 vl FROM classificacao po left join ficha_med f on po.cd_atendimento = f.cd_atendimento WHERE po.cd_paciente = :id_paciente and ifnull(f.finalizado , 'N') <> 'S'";
 
     $stmt=$con->prepare($query);
     $stmt->bindParam(':id_paciente',$this->cd_paciente);
     $result=$stmt->execute();

     if ($result) {

       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       if (isset($reg->vl)) {
           return $reg->vl;
       } else {
           return 1;
       }
         
     } else {
         echo "ERRO!";
     }
     



}

public function getDadosPaciente() {

         $con = Conexao::getInstance();
         $query = "select *  from paciente where cd_paciente  = :id_paciente";
         $stmt1=$con->prepare($query) ;
         $stmt1->bindParam(':id_paciente', $this->cd_paciente );
         $result1=$stmt1->execute();

         if ($result1) {


             $reg1=$stmt1->fetch(PDO::FETCH_OBJ);
             return $reg1;

         } else {
             echo "erro consulta paciente";
         }

}




public function cadastrarClassficacaoEnf(){
 $cd_usuario = $_SESSION['cd_usuario'];
 $con = Conexao::getInstance();
 $query = "insert into classificacao  (  `cd_usuario`, `temp`, `pad`, `pas`, `sat`, `has`, `diabetes`, `ds_evolucao`,  `dt_registro` ,  `cd_totem` ,  `protocolo` ,  `cd_paciente`, `classificacao`  ) values (:cd_usuario , :TEMP ,  :PAD  , :PAS ,  :SAT, :HAS ,  :DIAB, :ds_evolucao ,  NOW() , :totemP , :protocolo  , :cd_paciente , :CLARISCO ) ";

 $stmt=$con->prepare( $query );
 $stmt->bindParam(':totemP', intval($cd_totem));
 $stmt->bindParam(':cd_usuario',$cd_usuario);
 $stmt->bindParam(':TEMP',$this->temp);
  $stmt->bindParam(':PAD',$this->pad);
 $stmt->bindParam(':PAS',$this->pas);
 $stmt->bindParam(':SAT',$this->sat);
 $stmt->bindParam(':HAS',$this->has);
 $stmt->bindParam(':DIAB',$this->diabetes);
 $stmt->bindParam(':ds_evolucao',$this->evolucao);
 $stmt->bindParam(':totemP', $this->totem);
 $stmt->bindParam(':protocolo',$this->protocolo);
  $stmt->bindParam(':cd_paciente',$this->cd_paciente);
 $stmt->bindParam(':CLARISCO',$this->classificacao);
 
 
 $result=$stmt->execute();


 if ($result) {
     echo 'sucesso';
 } else {
    echo 'erro';
}


} 






public function listarAtendidoEnf(){

  $con = Conexao::getInstance();
  $lista_atd_enf = "SELECT c.cd_atendimento , pa.nome paciente , pa.dt_nascimento , c.classificacao , CASE WHEN c.classificacao = 'VERMELHO' THEN 1 WHEN c.classificacao = 'AMARELO' THEN 2 WHEN c.classificacao = 'VERDE' THEN 3 WHEN c.classificacao = 'AZUL' THEN 4 END CLALISTA , CASE WHEN c.protocolo = 'COVID-19' THEN 1 WHEN c.protocolo = 'SEPSE' THEN 1 ELSE 2 END CLAPROT , c.protocolo , u.nome usuario , u.nr_conselho , c.dt_registro, c.finalizado FROM usuario u , classificacao c , paciente pa where c.cd_paciente = pa.cd_paciente and c.cd_usuario = u.cd_usuario 
     and u.cd_usuario = 1 
      and c.cd_atendimento  not in  (select cd_atendimento from ficha_med where finalizado = 'S')


  ORDER BY CLALISTA , CLAPROT , c.cd_atendimento ";

  $stmt=$con->prepare($lista_atd_enf);
  $result=$stmt->execute();

  if ($result) {

     while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {


         echo "<tr>"; 
         echo "<td class='text-center'> ".$reg->cd_atendimento." </td>";
         echo "<td class='text-center'> ".$reg->paciente."</td>";
         echo "<td class='text-center'>".$reg->dt_nascimento." </td>";

         if($reg->classificacao=='AZUL'){ 

            echo "<td class='text-center'><i class='fas fa-circle text-primary'> </i> </td>"; 

         } elseif($reg->classificacao=='AMARELO') {

             echo "<td class='text-center'><i class='fas fa-circle text-warning'> </i> </td>"; 

         }  elseif($reg->classificacao=='VERDE') {

             echo "<td class='text-center'><i class='fas fa-circle text-success'> </i> </td>"; 

         } elseif($reg->classificacao=='VERMELHO') {

             echo "<td class='text-center'><i class='fas fa-circle text-danger'> </i> </td>"; 

         } 
         
          if($reg->protocolo=='COVID-19'){ 

              echo "<td class='text-center'><i class='fas fa-lungs-virus text-danger' ></i> </td>"; 

         } elseif  ($reg->protocolo=='SEPSE') { 

                 echo "<td class='text-center'><i class='fas fa-notes-medical text-warning'> </i> </td>"; 

         } else { echo "<td class='text-center'></td>"; 
                }
 

                  echo "<td class='text-center'>".$reg->usuario." </td>";
         echo "<td class='text-center'>".$reg->nr_conselho." </td>";
         echo "<td class='text-center'>".$reg->dt_registro." </td>";




         if ($reg->finalizado != 'S') 
         {

        echo "<td class='text-center'>  <a href='view/prontuario/prontuario.php?atd=".$reg->cd_atendimento."'> <i  class='fas fa-pen'></i></a></td>";

        echo "<td class='text-center'>  <a href='action/salvarprontenf.php?atd=".$reg->cd_atendimento."'> <i  class='fas fa-lock-open'></i></a></td>";

        echo "<td class='text-center' > <a href='action/excluirprontenf.php?atd=".$reg->cd_atendimento."'> <i class='fas fa-trash'></i> </a> </td>";

        } else {

            echo "<td class='text-center'><i  class='fas fa-pen text-danger'></i></td>";

            echo "<td class='text-center'><i  class='fas fa-user-lock text-danger'></i></td>";

            echo "<td class='text-center' >  <i class='fas fa-trash text-danger'></i>  </td>";
        }


        echo "</tr>";




    }

} else {
    echo "erro";
}




}

public function excluirdocenf()

{

 $con = Conexao::getInstance();
 $query= "delete from  classificacao where cd_atendimento  = :atd  and  excluido = 'N' ";
 $stmt=$con->prepare( $query);
 $stmt->bindParam(':atd',$this->atendimento);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}



public function salvardocenf()

{

 $con = Conexao::getInstance();
 $query = "update  classificacao set finalizado = 'S' where cd_atendimento  = :atd  ";
 $stmt=$con->prepare( $query);
 $stmt->bindParam(':atd',$this->atendimento);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}

public function buscarprontenf() 

{

  $con = Conexao::getInstance();
  $query = "SELECT po.* , pa.nome , pa.dt_nascimento , c.nr_carteira from classificacao po , paciente pa , carteira c where po.cd_paciente = pa.cd_paciente and po.cd_atendimento = :atd and pa.cd_paciente= c.cd_paciente ";
  $stmt=$con->prepare($query);
   $stmt->bindParam(':atd',$this->atendimento);
  $result=$stmt->execute();

  if ($result) {
      $reg=$stmt->fetch(PDO::FETCH_OBJ);
      return $reg;
  } else {
      echo 'falhou';
  }
  


}


public function editclassificacaoenf(){

 $con = Conexao::getInstance();
 $query = "update classificacao set temp = :TEMP   ,   pad=:PAD ,  pas = :PAS  , sat=:SAT , has= :HAS ,  diabetes= :DIAB
  ,ds_evolucao =:evo ,   dt_registro =  NOW() , protocolo= :protocolo ,    classificacao = :CLARISCO where cd_atendimento = :atendimento "  ;

 $stmt=$con->prepare( $query);
  $stmt->bindParam(':atendimento',$this->atendimento);
 $stmt->bindParam(':TEMP',$this->temp);
 $stmt->bindParam(':PAD',$this->pad);
 $stmt->bindParam(':PAS',$this->pas);
 $stmt->bindParam(':SAT',$this->sat);
 $stmt->bindParam(':HAS',$this->has);
 $stmt->bindParam(':DIAB',$this->diabetes);
 $stmt->bindParam(':evo',$this->evolucao);
 $stmt->bindParam(':protocolo',$this->protocolo);
 $stmt->bindParam(':CLARISCO',$this->classificacao);
 $result=$stmt->execute();


 if ($result) {
     echo 'sucesso';
 } else {
    echo 'erro';
}


} 


public function visualizarcla() {

  $con = Conexao::getInstance();
  $query= "SELECT c.cd_atendimento , pa.nome paciente , pa.dt_nascimento , c.classificacao , CASE WHEN c.classificacao = 'VERMELHO' THEN 1 WHEN c.classificacao = 'AMARELO' THEN 2 WHEN c.classificacao = 'VERDE' THEN 3 WHEN c.classificacao = 'AZUL' THEN 4 END CLALISTA , CASE WHEN c.protocolo = 'COVID-19' THEN 1 WHEN c.protocolo = 'SEPSE' THEN 1 ELSE 2 END CLAPROT , c.protocolo , u.nome usuario , u.nr_conselho , c.dt_registro, c.finalizado ,c.sat , c.temp , c.has , c.pad , c.pas , c.diabetes , c.ds_evolucao  FROM usuario u , classificacao c , paciente pa where c.cd_paciente = pa.cd_paciente and c.cd_usuario = u.cd_usuario and u.cd_usuario = 1 and cd_atendimento = :atd ORDER BY CLALISTA , CLAPROT ,
      c.cd_atendimento ";

  $stmt=$con->prepare($query);
   $stmt->bindParam(':atd',$this->atendimento);
  $result=$stmt->execute();


  if ($result) {
$reg=$stmt->fetch(PDO::FETCH_OBJ);
return $reg;
     
   
   } else{

echo'erro';
   }
  
}
}

?>