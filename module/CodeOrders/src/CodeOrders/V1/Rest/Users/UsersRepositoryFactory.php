<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 21/10/2015
 * Time: 14:11
 */

namespace CodeOrders\V1\Rest\Users;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class UsersRepositoryFactory implements FactoryInterface
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
        //O Mapper será necessário quando os atributos da entidade não forem iguais a da tabela do banco de dados
        //$userMapper = new UsersMapper();
        $hydrator = new HydratingResultSet(new ClassMethods(), new UsersEntity());
        $tableGateway = new TableGateway('oauth_users',$dbAdapter,null,$hydrator);
        $usersRepository  = new UsersRepository($tableGateway);

        return $usersRepository;

    }
}