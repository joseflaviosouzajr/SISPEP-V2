<?php  

class Lab
{
 
    public $id_classificacao;
    public $coletado;
    public $resultado;
    public $valor_ref;
    public $data_coleta;
    public $data_resultado;
    public $obs;
    public $cd_usuario;


public function getIdClassificacao()
{
    return $this->id_classificacao;
}
 
public function setIdClassificacao($classificacao)
{
    $this->id_classificacao = $classificacao;
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
    return $this->valor_ref;
}
 
public function setValorRef($vlref)
{
    $this->valor_ref = $vl_ref;
    return $this;
}

public function getDataColetac()
{
    return $this->data_coleta;
}
 
public function setDataColeta($dtcoleta)
{
    $this->$data_coleta = $dtcoleta;
    return $this;
}

public function getDataRes()
{
    return $this->data_resultado;
}
 
public function setDataRes($dtres)
{
    $this->$data_resultado = $dtres;
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


public function getUser()
{
    return $this->cd_usuario;
}
 
public function setUser($user)
{
    $this->$cd_usuario = $user;
    return $this;
}


}



?>





