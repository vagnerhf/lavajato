<?php
namespace Corrupto\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;
class CorruptoTable
{
    private $tableGateway;
    
    public function __construct(
        TableGatewayInterface $tableGateway
        )
   {
       $this->tableGateway =
       $tableGateway;
   }
   
   public function save(Corrupto $corrupto)
   {
       $set = $corrupto->toArray();
       
       if (empty($set['codigo'])){
           unset($set['codigo']);
           $this->tableGateway->insert($set);
       } else {
           $this->tableGateway->update(
               $set,['codigo' => $set['codigo']]);
       }
        
   }

   public function getAll($where = null)
   {
       return $this->tableGateway
       ->select($where);
   }
   
   public function delete($codigo)
   {       
       $this->tableGateway
       ->delete(['codigo' => $codigo]);       
   }
   
   public function get($codigo)
   {
       $corruptos = $this->getAll(
           ['codigo' => $codigo]
           );
       
       $corrupto = $corruptos->current();
       if (empty($corrupto)){
           return new Corrupto();
       } else {
           return $corrupto;
       }
   }
   
   
   
   
   
   
   
   
   
   
}   