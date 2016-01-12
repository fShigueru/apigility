<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 07/01/2016
 * Time: 18:58
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Stdlib\Hydrator\ObjectProperty;

class OrdersService
{

    private $repository;

    /**
     * OrdersService constructor.
     * @param $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function insert($data)
    {

        $hydrator = new ObjectProperty();
        $data = $hydrator->extract($data);

        $orderData = $data;
        unset($orderData['item']);

        $items = $data['item'];

        $tableGateway = $this->repository->getTableGateway();

        try{
            //inicia a transação
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();

            $orderId = $this->repository->insert($orderData);

            foreach($items as $item){
                $item['order_id'] = $orderId;
                $this->repository->insertItem($item);
            }

            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();

            return ['order_id' => $orderId];

        }catch(\Exception $e){
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }
    }

    public function update($id,$data)
    {

        $hydrator = new ObjectProperty();
        $data = $hydrator->extract($data);

        $orderData = $data;
        unset($orderData['item']);

        $items = $data['item'];

        $tableGateway = $this->repository->getTableGateway();

        try{
            //inicia a transação
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();

            $this->repository->update($id,$orderData);

            foreach($items as $item){
                $item['order_id'] = $id;
                $idItem = $item['id'];
                if($this->repository->findItem($idItem,$id)){
                    $this->repository->updateItem($idItem,$item);
                }
            }

            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();

            return ['order_id' => $id];

        }catch(\Exception $e){
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }

    }

    public function delete($id)
    {

        $tableGateway = $this->repository->getTableGateway();

        try{
            //inicia a transação
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();

            $this->repository->delete($id);

            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();

            return true;

        }catch(\Exception $e){
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }
    }
}