<?php
namespace CodeOrders\V1\Rest\Orders;

class OrdersEntity
{
    protected $id;
    protected $clientId;
    protected $userId;
    protected $ptypeId;
    protected $total;
    protected $status;
    protected $createdAt;
    protected $items;

    public function __construct()
    {
        $this->items = [];
    }


    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return OrdersEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     * @return OrdersEntity
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return OrdersEntity
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPtypeId()
    {
        return $this->ptypeId;
    }

    /**
     * @param mixed $ptypeId
     * @return OrdersEntity
     */
    public function setPtypeId($ptypeId)
    {
        $this->ptypeId = $ptypeId;
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
     * @return OrdersEntity
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return OrdersEntity
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return OrdersEntity
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }




    /**
     * @param mixed $items
     * @return OrdersEntity
     */
    public function addItem($item)
    {
        $this->items[] = $item;
        return $this;
    }


}
