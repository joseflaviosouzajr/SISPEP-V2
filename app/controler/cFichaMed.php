<?php 
class ControlerFichaMed extends FichaMed {

   

   public function listaratdmed(){


 $con = Conexao::getInstance();
 $QUERY = "


 SELECT distinct lp.cd_LAB ,lp.resultado, PO.cd_atendimento , PA.nome , PA.dt_nascimento , po.classificacao ,  po.protocolo ,  CASE WHEN po.classificacao = 'VERMELHO' THEN 1 WHEN po.classificacao = 'AMARELO' THEN 2 WHEN po.classificacao = 'VERDE' THEN 3 WHEN po.classificacao = 'AZUL' THEN 4 END CLALISTA , CASE WHEN po.protocolo = 'COVID-19' THEN 1 WHEN po.protocolo = 'SEPSE' THEN 1 ELSE 2 END CLAPROT  , lp.coletado FROM CLASSIFICACAO PO LEFT JOIN lab lp on po.cd_atendimento = lp.cd_ATENDIMENTO left JOIN PACIENTE PA ON PO.cd_paciente = PA.cd_paciente WHERE po.FINALIZADO = 'S' AND PO.cd_atendimento NOT IN (SELECT CD_ATENDIMENTO FROM ficha_med ) 

  order by claprot , clalista    ";
 $stmt=$con->prepare($QUERY);
 $result=$stmt->execute();

 if ($result) {

     while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {


         echo "<tr>"; 
         echo "<td class='text-center'> ATD: ".$reg->cd_atendimento." </td>";
         echo "<td class='text-center'> ".$reg->nome."</td>";
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


                    echo "<td class='text-center'><i class='fas fa-volume-up' data-atd='".$reg->cd_atendimento."' data-paciente='".$reg->nome."'></i></td>"; 
                    
             
         echo "</tr>";




     }

 } else {
    echo "erro";
}


}


public function dadoatdmed($atd){


 $con = Conexao::getInstance();
 $query= "SELECT distinct  PO.* , PA.nome , PA.dt_nascimento  FROM classificacao PO left JOIN PACIENTE PA ON PO.cd_paciente = PA.cd_paciente WHERE  po.finalizado = 'S'  and PO.cd_atendimento = $atd" ;
 $stmt=$con->prepare($query);
 $result=$stmt->execute();

 if ($result) {

      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      
      return $reg;     

} else {
    echo "erro";
}


}

public function cadprontmed(){
 $cd_usuario_med=3;
 $con = Conexao::getInstance();
 $query = "insert into  ficha_med  ( cd_atendimento , cd_usuario , ds_conduta   , ds_queixa , motivo_alta , dt_registro , finalizado , aceite_protocolo ) values  ( :atendimento , :cd_usuario_med , :conduta  ,  :queixa  , :motivo_alta , NOW() ,'N', :aceite )  "  ;

 $stmt=$con->prepare($query);
 $stmt->bindParam(':atendimento',$this->atendimento);
 $stmt->bindParam(':cd_usuario_med',$cd_usuario_med);
 $stmt->bindParam(':conduta',$this->conduta);
 $stmt->bindParam(':queixa',$this->queixa);
 $stmt->bindParam(':motivo_alta',$this->motivo_alta);
  $stmt->bindParam(':aceite',$this->aceite_prot);


 $result=$stmt->execute();


 if ($result) {
     echo 'sucesso';
 } else {
    echo 'erro';
}


} 




}


 ?>