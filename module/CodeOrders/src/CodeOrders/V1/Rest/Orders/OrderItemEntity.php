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
    protected $quantityId;
    protected $prince;
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
    public function getQuantityId()
    {
        return $this->quantityId;
    }

    /**
     * @param mixed $quantityId
     * @return OrderItemEntity
     */
    public function setQuantityId($quantityId)
    {
        $this->quantityId = $quantityId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrince()
    {
        return $this->prince;
    }

    /**
     * @param mixed $prince
     * @return OrderItemEntity
     */
    public function setPrince($prince)
    {
        $this->prince = $prince;
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