<?php 

  class FichaMed {

  public $fichaMed;
  public $conduta;
  public $atendimento;
  public $queixa;
  public $motivo_alta;
  public $cd_usuario;
  public $dt_regitro;
  public $finalizado;
  public $aceite_prot;



public function getFicha()
{
    return $this->$fichaMed;
}
 
public function setFicha($fichaP)

{
    $this->$fichaMed = $fichaP;
    return $this;
}


public function getConduta()
{
    return $this->conduta;
}
 
public function setConduta($cond)

{
    $this->conduta = $cond;
    return $this;
}

public function getAtendimento()
{
    return $this->conduta;
}
 
public function setAtendimento($atd)

{
    $this->atendimento= $atd;
    return $this;
}

public function getQueixa()
{
    return $this->queixa;
}
 
public function setQueixa($queixa1)

{
    $this->queixa = $queixa1;
    return $this;
}

public function getMotivoAlta()
{
    return $this->motivo_alta;
}
 
public function setMotivoAlta($alta)

{
    $this->motivo_alta = $alta;
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
public function getDtRegistro()
{
    return $this->dt_registro;
}
 
public function setDtRegistro($dtreg)
{
    $this->dt_registro = $dtreg;
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



public function getAceite()
{
    return $this->aceite_prot;
}
 
public function setAceite($aceite)
{
    $this->aceite_prot = $aceite;
    return $this;
}




  }

 ?>