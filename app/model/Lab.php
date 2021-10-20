<?php  

class Lab
{
    public $cd_lab;
    public $cd_atendimento;
    public $cd_usuario;
    public $coletado;
    public $resultado;
    public $valor;
    public $data_coleta;
    public $data_resultado;
    public $obs;
   


public function getLab()
{
    return $this->cd_lab;
}
 
public function setLab($lab)
{
    $this->cd_lab = $lab;
    return $this;
}

public function getAtendimento()
{
    return $this->cd_atendimento;
}
 
public function setAtendimento($atd)
{
    $this->cd_atendimento = $atd;
    return $this;
}
 
public function getUser()
{
    return $this->cd_usuario;
}
 
public function setUser($user)
{
    $this->$cd_usuario = $user;
    return $this;
}

 public function getColetado()
 {
     return $this->coletado;
 }
  
 public function setColetado($coleta)
 {
     $this->coletado = $coleta;
     return $this;
 }

public function getResultado()
{
    return $this->resultado;
}
 
public function setResultado($res)
{
    $this->resultado = $res;
    return $this;
}


public function getValorRef()
{
    return $this->valor;
}
 
public function setValorRef($vlref)
{
    $this->valor = $vlref;
    return $this;
}

public function getDataColetac()
{
    return $this->dt_coleta;
}
 
public function setDataColeta($dtcoleta)
{
    $this->$dt_coleta = $dtcoleta;
    return $this;
}

public function getDataRes()
{
    return $this->dt_resultado;
}
 
public function setDataRes($dtres)
{
    $this->$dt_resultado = $dtres;
    return $this;
}


public function getObs()
{
    return $this->obs;
}
 
public function setObs($obs_lab)
{
    $this->$obs = $obs_lab;
    return $this;
}





}



?>





