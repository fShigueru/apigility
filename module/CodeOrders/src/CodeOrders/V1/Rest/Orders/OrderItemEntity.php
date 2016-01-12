<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:12
 */

namespace CodeOrders\V1\Rest\Orders;


class OrderItemEntity
{

    protected $id;
    protected $orderId;
    protected $productId;
    protected $quantity;
    protected $price;
    protected $total;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return OrderItemEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     * @return OrderItemEntity
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     * @return OrderItemEntity
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return OrderItemEntity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return OrderItemEntity
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     * @return OrderItemEntity
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }


}