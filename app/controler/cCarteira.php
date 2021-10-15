<?php 

/**
 * 
 */
class ControlerCarteira extends Carteira
{
	
	 public function localizarCarteira(){

     $con = Conexao::getInstance();
     $query= "  SELECT  id_paciente_fk

                               FROM  carteira  where nr_carteira = :carteira
   

      ";

     $stmt=$con->prepare($query);
     $stmt->bindParam(':carteira',$this->carteira);
     $result=$stmt->execute();

     if ($result) {

       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       if (isset($reg->id_paciente_fk)) {
           return $reg->id_paciente_fk;
       } else {
           return 0;
       }
         
     } else {
         echo "ERRO!";
     }
     



}
}

 ?>