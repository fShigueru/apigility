<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:37
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

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

        $orderItemTableGateway = $serviceLocator->get('CodeOrders\\V1\\Rest\\Orders\\OrderItemTableGateway');

        $ordersRepository  = new OrdersRepository($tableGateway, $orderItemTableGateway);

        return $ordersRepository;
    }
}