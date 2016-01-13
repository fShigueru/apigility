<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 12/01/2016
 * Time: 22:37
 */

namespace CodeOrders\V1\Rest\Products;


use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;

class ProductsRepository
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $paginatorAdapter = new DbTableGateway($this->tableGateway);
        return new ProductsCollection($paginatorAdapter);
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
        return ['product_id' => $this->tableGateway->getLastInsertValue()];
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => $id]);
        return true;
    }

    public function update($id,$data)
    {
        $this->tableGateway->update($data,['id' => $id]);
        return ['product_id' => $id];
    }


}