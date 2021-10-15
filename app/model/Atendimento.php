<?php 

class Atendimento {

   public $paciente;
   public $totem;


   public function getPaciente()
   {
       return $this->paciente;
   }
    
   public function setPaciente($pac)
   {
       $this->paciente = $pac;
       return $this;
   }

   public function getTotem()
   {
       return $this->totem;
   }
    
   public function setTotem($tot)
   {
       $this->totem = $tot;
       return $this;
   }

}



 ?>