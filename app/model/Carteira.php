<?php 


/**
 * 
 */
class Carteira 
{
	
	public $carteira;
		public $paciente;


		public function getCarteira()
		{
		    return $this->carteira;
		}
		 
		public function setCarteira($cart)
		{
		    $this->carteira = $cart;
		    return $this;
		}



	public function getPaciente()
		{
		    return $this->paciente;
		}
		 
		public function setPaciente($pac)
		{
		    $this->paciente = $pac;
		    return $this;
		}

}


 ?>