<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 22/10/2015
 * Time: 12:31
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\TableGateway\AbstractTableGateway;

class OrdersRepository
{

    private $tableGateway;
    private $orderItemTableGateway;

    public function __construct(TableGatewayInterface $tableGateway, AbstractTableGateway $orderItemTableGateway)
    {
        $this->tableGateway = $tableGateway;
        $this->orderItemTableGateway = $orderItemTableGateway;
    }


}