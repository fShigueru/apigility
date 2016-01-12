<?php
namespace CodeOrders\V1\Rest\Clients;

class ClientsResourceFactory
{
    public function __invoke($services)
    {
        return new ClientsResource();
    }
}
