<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 21/10/2015
 * Time: 14:07
 */

namespace CodeOrders\V1\Rest\Users;


use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;

class UsersRepository
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $tableGateway = $this->tableGateway;
        //tipo de adaptador para paginação, precisa passar o table gateway
        $paginatorAdapter = new DbTableGateway($tableGateway);

        //retornando um UsersCollection ele vai fazer a paginação, porque ele extends de paginator
        return new UsersCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $resultSet = $this->tableGateway->select(['id' => (int)$id]);
        return $resultSet->current();
    }

}