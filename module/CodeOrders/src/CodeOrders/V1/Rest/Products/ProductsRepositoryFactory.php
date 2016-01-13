<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 12/01/2016
 * Time: 22:38
 */

namespace CodeOrders\V1\Rest\Products;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ProductsRepositoryFactory implements FactoryInterface
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
        $hydrator = new HydratingResultSet(new ClassMethods(), new ProductsEntity());
        $tableGateway = new TableGateway('products',$dbAdapter,null,$hydrator);
        $productsRepository = new ProductsRepository($tableGateway);

        return $productsRepository;
    }
}