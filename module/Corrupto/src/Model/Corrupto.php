<?php
namespace Corrupto\Model;

class Corrupto
{
    /**
     * @var integer
     */
    public $codigo;
    /**
     * @var string
     */
    public $nome;
    
    public function exchangeArray($array)
    {
        $this->codigo = 
        isset($array['codigo']) ?
        $array['codigo'] : null;
        $this->nome =
        isset($array['nome']) ?
        $array['nome'] : null;
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}