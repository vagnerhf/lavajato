<?php
namespace Corrupto\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
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
       
       $this->tableGateway->insert($set);
   }
   
   
   
   
   
}   