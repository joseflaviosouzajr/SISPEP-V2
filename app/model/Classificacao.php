<?php 

  /**
   * 
   */
  class Classificacao
  {
  	 


  	 public $atendimento;
  	 public $cd_usuario;
  	 public $temp;
  	 public $pas;
  	 public $pad;
  	 public $sat;
  	 public $has;
  	 public $diabetes;
  	 public $evolucao;
  	 public $finalizado;
  	 public $dt_regitro;
  	 public $excluido;
  	 public $protocolo;
     public $cd_paciente;
     public $classificao;
     public $totem;

  	 

   
public function getAtendimento()
{
    return $this->atendimento;
}
 
public function setAtendimento($atd)
{
    $this->atendimento = $atd;
    return $this;
}


public function getUser()
{
    return $this->cd_usuario;
}
 
public function setUser($usuario)
{
    $this->cd_usuario = $usuario;
    return $this;
}
   public function getTemp()
   {
       return $this->temp;
   }
    
   public function setTemp($temperatura)
   {
       $this->temp = $temperatura;
       return $this;
   }




   public function getPas()
   {
       return $this->pas;
   }
    
   public function setPas($pas1)
   {
       $this->pas = $pas1;
       return $this;
   }
	

	public function getPad()
	{
	    return $this->pad;
	}
	 
	public function setPad($pad1)
	{
	    $this->pad = $pad1;
	    return $this;
	}

	public function getSat()
	{
	    return $this->sat;
	}
	 
	public function setSat($sat1)
	{
	    $this->sat = $sat1;
	    return $this;
	}

  public function getHas()
  {
      return $this->has;
  }
   
  public function setHas($has1)
  {
      $this->has = $has1;
      return $this;
  }


public function getDiabetes()
{
    return $this->diabetes;
}
 
public function setDiabetes($diab)
{
    $this->diabetes = $diab;
    return $this;
}


public function getEvolucao()
{
    return $this->evolucao;
}
 
public function setEvolucao($evo)
{
    $this->evolucao = $evo;
    return $this;
}


public function getFinalizado()
{
    return $this->finalizado;
}
 
public function setFinalizado($fim)
{
    $this->finalizado = $fim;
    return $this;
}


public function getDtRegistro()
{
    return $this->dt_registro;
}
 
public function setDtRegistro($dtreg)
{
    $this->dt_registro = $dtreg;
    return $this;
}


public function getExluido()
{
    return $this->excluido;
}
 
public function setExcluido($exc)
{
    $this->excluido = $exc;
    return $this;
}

public function getProtocolo()
{
    return $this->protocolo;
}
 
public function setProtocolo($prot)
{
    $this->protocolo = $prot;
    return $this;
}


public function getPaciente()
{
    return $this->cd_paciente;
}
 
public function setPaciente($pac)
{
    $this->cd_paciente = $pac;
    return $this;
}


public function getClassificacao()
{
    return $this->classificacao;
}
 
public function setClassificacao($cla)
{
    $this->classificacao = $cla;
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