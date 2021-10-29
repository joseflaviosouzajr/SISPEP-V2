<?php 

/**
 * 
 */
class ControlerTotem extends Totem{


public function retirarSenha($prioridade)

	{
       $con = Conexao::getInstance();
       $query = "insert into totem (ds_prioridade, dt_registro ) values (:prioridade , Now())";
       $stmt=$con->prepare($query);
       $stmt->bindParam(':prioridade',$prioridade);
       $result=$stmt->execute();

       if ($result) {
              
       	return "suscesso";

       } else {
       	echo "erro";
       }
       


      
	}


public function ultimaSenha(){


          $con = Conexao::getInstance();
       $listarultimo = "select * from totem where cd_totem in ( select max(cd_totem) from totem )";
       $stmt=$con->prepare($listarultimo);
             $result=$stmt->execute();

           if ($result) {
       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       echo '<h1>Senha: </h1><h2>'.$reg->cd_totem.'</h2>';
       if ($reg->ds_prioridade == 'P') {
       	echo '<h4> PRIORIDADE </h4>';
       } else {
       	echo '<h4> NORMAL </h4>';
       }
        echo '<h1>data/hora: </h1><h2>'.$reg->dt_registro.'</h2>';
       
       } else {
       	echo "erro";
       }


                }

    public function listarSenhasEnf(){
     

       $con = Conexao::getInstance();
       $query= "select cd_totem , case when ds_prioridade = 'P' then 'PRIORIDADE' ELSE 'NORMAL'  end prioridade  ,   

       case when ds_prioridade = 'P' then '1' ELSE '2'  end prioridadelista  ,
        dt_registro 
       from totem where chamado = 'N'  and excluido = 'N' order by prioridadelista  ";
       $stmt=$con->prepare($query);
             $result=$stmt->execute();

           if ($result) {
                     
           while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {
           
           
           echo "<tr>"; 
           echo "<td class='text-center'> Nr: ".$reg->cd_totem." - ".$reg->prioridade."</td>";
           echo "<td class='text-center'> ".$reg->dt_registro."</td>";
           echo "<td class='text-center'><i data-nrprioridade='".$reg->cd_totem."' data-priority='".$reg->cd_totem." - ".$reg->prioridade."' data-prioridade='".$reg->prioridade."' class='fas fa-volume-up'></i></td>";
           echo "<td class='text-center' > <a href='action/excluirsenha.php?senha=".$reg->cd_totem."'> <i class='fas fa-trash'></i> </a> </td>";
            echo "</tr>";




           }

       } else {
       	echo "erro";
       }


    }

 public function excluirSenha(){

       $con = Conexao::getInstance();
       $query = "delete from totem where cd_totem  = :totem";
       $stmt=$con->prepare($query);
       $stmt->bindParam(':totem',$this->totem);
       $result=$stmt->execute();

       if ($result) {
        echo "suscesso";
       } else {
        echo "erro";
       }

 }


 public function senhaChamada(){

  
       $con = Conexao::getInstance();
       $query = "update  totem set chamado = 'S'  where cd_totem  = :totem";
       $stmt=$con->prepare( $query);
       $stmt->bindParam(':totem',$this->cd_totem);
       $result=$stmt->execute();

       if ($result) {
        echo "suscesso";
       } else {
        echo "erro";
       }

 }

 


}
	
	



 ?>