<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:37
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrdersRepositoryFactory implements FactoryInterface
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
        $hydrator = new HydratingResultSet(new ClassMethods(), new OrdersEntity());
        $tableGateway = new TableGateway('orders',$dbAdapter,null,$hydrator);
        $ordersRepository  = new OrdersRepository($tableGateway);

        return $ordersRepository;
    }
}