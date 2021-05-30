<?php

namespace App\Contracts;

interface OrderContract
{
    public function storeOrderDetails($params);

    public function listOrders( $order = 'id',  $sort = 'desc', array $columns = ['*']);

    public function findOrderByNumber($orderNumber);
}
