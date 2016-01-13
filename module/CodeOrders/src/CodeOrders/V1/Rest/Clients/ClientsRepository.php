<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 12/01/2016
 * Time: 12:38
 */

namespace CodeOrders\V1\Rest\Clients;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\ObjectProperty;

class ClientsRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $paginatorAdapter = new DbTableGateway($this->tableGateway);
        return new ClientsCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $resultSet = $this->tableGateway->select(['id' => (int)$id]);
        return $resultSet->current();
    }

    public function insert($data)
    {
        $hydrator = new ObjectProperty();
        $this->tableGateway->insert($hydrator->extract($data));
        return ['client_id' => $this->tableGateway->getLastInsertValue()];
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => $id]);
        return true;
    }

    public function update($id,$data)
    {
        $this->tableGateway->update($data,['id' => $id]);
        return ['client_id' => $id];
    }

}