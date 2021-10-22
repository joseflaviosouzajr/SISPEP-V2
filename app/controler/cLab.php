<?php 

/**
 * 
 */
class ControlerLab extends lab
{

 public function inserirPedidoLab() {
     $cd_usuario = $_SESSION['cd_usuario'];
     $con = Conexao::getInstance();
     $query = 'insert into lab (cd_atendimento, cd_usuario ,  coletado,  dt_coleta)  values (:atd_pedido , :cd_usuario , :coletado , NULL)';
     $stmt=$con->prepare($query);
     $stmt->bindParam(':atd_pedido', $this->cd_atendimento);
     $stmt->bindParam(':cd_usuario', $cd_usuario);
     $stmt->bindParam(':coletado', $this->coletado);

      // var_dump($stmt);
     $result=$stmt->execute();


     if ($result) {
         echo 'pedido coletado';

     } else {
       echo "erro na coleta";
   }     
}


public function resultadoPedidoLab(){

 $con = Conexao::getInstance();
 $query = 'update lab set resultado = :resultado  , valor= :valor ,  dt_resultado = NOW() , obs = :obs  where cd_atendimento = :atd_pedido' ;
 $stmt=$con->prepare($query);
 $stmt->bindParam(':resultado',$this->resultado);
 $stmt->bindParam(':atd_pedido', intval($this->cd_atendimento));
 $stmt->bindParam(':valor',$this->valor);
 $stmt->bindParam(':obs',$this->obs);
 $result=$stmt->execute();


 if ($result) {
     echo 'pedido laudado';

 } else {
   echo "erro na coleta";


}

}


public function updateResPedidoLab()  {
 $usuario=$_SESSION['cd_usuario'];
 $con = Conexao::getInstance();
 $query = 'update lab set  dt_coleta = now() , coletado = :coletado , cd_usuario = :cd_usuario  where cd_atendimento = :atd_pedido' ;
 $stmt=$con->prepare($query);

 $stmt->bindParam(':atd_pedido',  intval($this->cd_atendimento) );
   $stmt->bindParam(':cd_usuario', $usuario);
  $stmt->bindParam(':coletado', $this->coletado);
  $result=$stmt->execute();


 if ($result) {
     echo 'res laudado';

 } else {
   echo "erro na coleta";


}

}

}


?>