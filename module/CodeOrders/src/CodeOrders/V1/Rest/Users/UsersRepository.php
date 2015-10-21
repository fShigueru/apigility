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
use Zend\Stdlib\Hydrator\ObjectProperty;

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
        $paginatorAdapter = new DbTableGateway($tableGateway);

        return new UsersCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $resultSet = $this->tableGateway->select(['id' => (int)$id]);
        return $resultSet->current();
    }

    public function insert($data)
    {
        $hydrator = new ObjectProperty();
        return $this->tableGateway->insert($hydrator->extract($data));
    }

    public function update($id,$data)
    {
        $hydrator = new ObjectProperty();
        return $this->tableGateway->update($hydrator->extract($data),['id' => $id]);
    }

    public function delete($id){
        $this->tableGateway->delete(['id' => $id]);
        return true;
    }

}