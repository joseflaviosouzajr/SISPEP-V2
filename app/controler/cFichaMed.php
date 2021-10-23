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


public function listarAtendidoMed(){

  $con = Conexao::getInstance();
  $query = "SELECT fm.cd_ficha , c.cd_atendimento , pa.nome paciente , pa.dt_nascimento , c.classificacao , 
CASE WHEN c.classificacao = 'VERMELHO' THEN 1 WHEN c.classificacao = 'AMARELO' THEN 2 WHEN c.classificacao = 'VERDE' THEN 3 WHEN c.classificacao = 'AZUL' THEN 4 END CLALISTA , CASE WHEN c.protocolo = 'COVID-19' THEN 1 WHEN c.protocolo = 'SEPSE' THEN 1 ELSE 2 END CLAPROT ,  u.nome usuario , u.nr_conselho , fm.dt_registro,  fm.finalizado ,  fm.aceite_protocolo ,  case when  fm.aceite_protocolo = 0 then  null  else c.protocolo end aceite
FROM usuario u , classificacao c , paciente pa , ficha_med fm
where fm.cd_atendimento = c.cd_atendimento
and c.cd_paciente = pa.cd_paciente 
and fm.cd_usuario = u.cd_usuario 
and u.cd_usuario = 3
ORDER BY CLALISTA , CLAPROT , c.cd_atendimento ";

  $stmt=$con->prepare($query);
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
            
          if($reg->aceite_protocolo==1 && $reg->aceite=='COVID-19'){ 

              echo "<td class='text-center'><i class='fas fa-lungs-virus text-danger' ></i> </td>"; 

         } elseif  ($reg->aceite_protocolo==1 && $reg->aceite=='SEPSE') { 

                 echo "<td class='text-center'><i class='fas fa-notes-medical text-warning'> </i> </td>"; 

         } elseif ($reg->aceite_protocolo==0 ) { echo "<td class='text-center'></td>"; 
                }
 

                  echo "<td class='text-center'>".$reg->usuario." </td>";
         echo "<td class='text-center'>".$reg->nr_conselho." </td>";
         echo "<td class='text-center'>".$reg->dt_registro." </td>";




         if ($reg->finalizado != 'S') 
         {

        echo "<td class='text-center'>  <a href='prontuario_medico.php?atd=".$reg->cd_atendimento."&cd_ficha=".$reg->cd_ficha."'> <i  class='fas fa-pen'></i></a></td>";

        echo "<td class='text-center'>  <a href='../../action/salvarprontmed.php?cd_ficha=".$reg->cd_ficha."'> <i  class='fas fa-lock-open'></i></a></td>";

        echo "<td class='text-center' > <a href='../../action/excluirprontmed.php?cd_ficha=".$reg->cd_ficha."'> <i class='fas fa-trash'></i> </a> </td>";

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


public function excluirdocmed($ficha)

{

 $con = Conexao::getInstance();
 $query= "delete from  ficha_med where cd_ficha = :cd_ficha  and  finalizado = 'N' ";
 $stmt=$con->prepare($query);
 $stmt->bindParam(':cd_ficha',$ficha);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}



public function salvardocmed($ficha)

{

 $con = Conexao::getInstance();
 $query = "update  ficha_med set finalizado = 'S' where cd_ficha  = :cd_ficha  ";
 $stmt=$con->prepare( $query);
 $stmt->bindParam(':cd_ficha',$ficha);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}


public function dadosfichamed($atd , $ficha)

{

 $con = Conexao::getInstance();
 $query= "select * from  ficha_med where cd_atendimento  = :atd  and cd_ficha  = :ficha  and   finalizado = 'N' ";
 $stmt=$con->prepare($query);
 $stmt->bindParam(':atd',$atd);
 $stmt->bindParam(':ficha',$ficha);
 $result=$stmt->execute();

 if ($result) {
    $reg=$stmt->fetch(PDO::FETCH_OBJ);
    return $reg;
} else {
    echo "erro";
}


}

}


 ?>