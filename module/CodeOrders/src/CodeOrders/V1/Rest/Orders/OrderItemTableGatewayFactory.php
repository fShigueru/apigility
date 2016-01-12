<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:17
 *
 * Responsavel por fabriar a tableGateway para OrderItem
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class OrderItemTableGatewayFactory implements FactoryInterface
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
        $hydrator = new HydratingResultSet(new ClassMethods(), new OrderItemEntity());
        $tableGateWay = new TableGateway('order_items',$dbAdapter,null,$hydrator);

        return $tableGateWay;

    }
}