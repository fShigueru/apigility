<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:31
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\ObjectProperty;

class OrdersRepository
{

    private $tableGateway;
    private $orderItemTableGateway;

    public function __construct(AbstractTableGateway $tableGateway, AbstractTableGateway $orderItemTableGateway)
    {
        $this->tableGateway = $tableGateway;
        $this->orderItemTableGateway = $orderItemTableGateway;
    }


    public function findAll()
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));
        $orders =  $this->tableGateway->select();

        $res = [];

        foreach ($orders as $order) {
            $items = $this->orderItemTableGateway->select(['order_id' => $order->getId()]);
            foreach ($items as $item){
                $order->addItem($item);
            }
            $res[] = $hydrator->extract($order);
        }

        $arrayAdapter = new ArrayAdapter($res);

        $ordersCollection = new OrdersCollection($arrayAdapter);

        return $ordersCollection;

    }

    public function find($id)
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));
        $order =  $this->tableGateway->select(['id' => (int)$id])->current();

        if(!$order){
            return null;
        }

        $items = $this->orderItemTableGateway->select(['order_id' => $order->getId()]);
        foreach ($items as $item){
            $order->addItem($item);
        }

        return $hydrator->extract($order);
    }

    public function insert(array $data)
    {
        $this->tableGateway->insert($data);
        //retorna o ultimo id
        return $this->tableGateway->getLastInsertValue();

    }

    public function insertItem(array $data)
    {
        $this->orderItemTableGateway->insert($data);
        return $this->orderItemTableGateway->getLastInsertValue();
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function update($id,$data)
    {
        $this->tableGateway->update($data,['id' => $id]);
        return $id;
    }

    public function updateItem($id ,array $data)
    {
        $this->orderItemTableGateway->update($data,['id' => $id]);
        return $id;
    }

    public function findItem($id,$idOrder)
    {
        $hydrator = new ClassMethods();

        $item = $this->orderItemTableGateway->select(['order_id' => $idOrder, 'id' => $id])->current();
        if(!$item){
            return null;
        }

        return $hydrator->extract($item);
    }

    public function delete($id)
    {
        $this->orderItemTableGateway->delete(['order_id' => $id]);
        $this->tableGateway->delete(['id' => $id]);
    }

    public function isOrderOfUser($id,$userId)
    {
        return $this->tableGateway->select(['id' => (int)$id, 'user_id' => $userId])->current();
    }
}