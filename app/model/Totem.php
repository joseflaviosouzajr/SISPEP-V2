<?php  



class Totem
{
 
 
  


    public $totem;
    public $ds_prioridade;
    public $dt_registro;
    public $chamado;
    public $excluido;


    public function setTotem($totem)

    {

      $this->totem = $totem;

      return $this;


  }


  public function getTotem()
  {
      return $this->$totem;
  }



  public function setPrioridade($prioridade)

  {

      $this->totem = $prioridade;

      return $this;


  }


  public function getPrioridade()
  {
      return $this->$prioridade;



  }





  public function setDataRegistro($data)

  {

      $this->dt_registro= $data;

      return $this;


  }


  public function getDataRegistro()
  {
      return $this->$dt_registro;



  }

  public function getChamado()
{
    return $this->chamado;
}

public function setChamado($chamado)
{
    $this->chamado = $chamado;
    return $this;
}



  public function getExcluido()
  {
    return $this->excluido;
}

public function setxcluido($excluido)
{
    $this->ativo = $excluido;
    return $this;
}






}



?>





