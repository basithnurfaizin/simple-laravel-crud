<?php


namespace App\Service;


interface SalesOrderService extends BaseService
{
    public function getOrderDetailById($id);

    public function createOrder($array);
}
