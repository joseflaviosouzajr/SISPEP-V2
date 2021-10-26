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

public function listarAtdColeta(){


 $con = Conexao::getInstance();
 $listaratdcoleta = "SELECT distinct l.cd_lab ,l.resultado, c.cd_atendimento , PA.nome , PA.dt_nascimento , l.coletado FROM classificacao c LEFT JOIN lab l on c.cd_atendimento = l.cd_atendimento left JOIN PACIENTE PA ON c.cd_paciente = PA.cd_paciente WHERE PROTOCOLO = 'COVID-19' and finalizado = 'S'
      and  c.cd_atendimento not in (select f.cd_atendimento from ficha_med f where f.finalizado = 'S' ) ";
 $stmt=$con->prepare($listaratdcoleta);
 $result=$stmt->execute();

 if ($result) {

     while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {


         echo "<tr>"; 
         echo "<td class='text-center'> ATD: ".$reg->cd_atendimento." </td>";
         echo "<td class='text-center'> ".$reg->nome."</td>";
         echo "<td class='text-center'>".$reg->dt_nascimento." </td>";
         
         if($reg->coletado=='S') { 
         echo "<td class='text-center'>   <i class='fas fa-vial text-danger'></i></td>"; }
             else {  echo "<td class='text-center'>  <a href='action/coletarlab.php?cdAtendimento=".$reg->cd_atendimento."' > <i class='fas fa-vial'></i></a></td>"; }

               if($reg->resultado==1 || $reg->resultado==2) { 
       echo "<td class='text-center' >  <i class='fas fa-microscope text-danger'></i>  </td>";
     } elseif($reg->coletado=='N') {  
       echo "<td class='text-center' > <i class='fas fa-microscope'></i> </td>";
    } else {
        echo "<td class='text-center' > <a href='#' > <i class='fas fa-microscope modal-resultado' data-atendimento='".$reg->cd_atendimento."'></i> </a> </td>";
    }

         
         echo "</tr>";




     }

 } else {
    echo "erro";
}


}


}


?>