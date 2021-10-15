<?php 

  class FichaMed {

  public $conduta;
  public $queixa;
  public $motivo_alta;
  public $cd_usuario;
  public $dt_regitro;
  public $finalizado;
  public $aceite_prot;
  public $justificativa;
  public $classifcacao;



public function getConduta()
{
    return $this->conduta;
}
 
public function setConduta($cond)

{
    $this->conduta = $cond;
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

public function getQueixa()
{
    return $this->queixa;
}
 
public function setQueixa($queixa1)

{
    $this->queixa = $queixa1;
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

public function getJustificativa()
{
    return $this->justificativa;
}
 
public function setJustificativa($just)
{
    $this->justificativa = $just;
    return $this;
}

public function getClassificacao()
{
    return $this->justificativa;
}
 
public function setClassificacao($class)
{
    $this->classificacao = $class;
    return $this;
}


  }

 ?>