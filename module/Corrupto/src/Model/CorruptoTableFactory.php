<?php
namespace Corrupto\Model;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;
class CorruptoTableFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get('DbAdapter');
	    $tableGateway = new TableGateway('corruptos', $adapter);
	    return new CorruptoTable($tableGateway);
	}
}

?>