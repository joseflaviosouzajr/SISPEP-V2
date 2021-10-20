<?php 

/**
 * 
 */
class ControlerCarteira extends Carteira
{
	
	 public function localizarCarteira(){

     $con = Conexao::getInstance();
     $query= "  SELECT  cd_paciente

                               FROM  carteira  where nr_carteira = :carteira
   

      ";

     $stmt=$con->prepare($query);
     $stmt->bindParam(':carteira',$this->carteira);
     $result=$stmt->execute();

     if ($result) {

       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       if (isset($reg->cd_paciente)) {
           return $reg->cd_paciente;
       } else {
           return 0;
       }
         
     } else {
         echo "ERRO!";
     }
     



}
}

 ?>