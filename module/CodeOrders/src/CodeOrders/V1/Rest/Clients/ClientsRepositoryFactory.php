<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 12/01/2016
 * Time: 12:39
 */

namespace CodeOrders\V1\Rest\Clients;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ClientsRepositoryFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new ClientsEntity());
        $tableGateway = new TableGateway('clients',$dbAdapter,null,$hydrator);
        $clientsRepository = new ClientsRepository($tableGateway);

        return $clientsRepository;
    }
}