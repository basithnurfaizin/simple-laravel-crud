<?php


namespace App\Repository;

use App\Models\SalesOrder;


class SalesOrderRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return SalesOrder::class;
    }

    public function detailOrder()
    {
        return $this->model::with('orderDetail')->get();
    }

    public function findOrderById($id)
    {
        return $this->model::with('orderDetail')->where('id',$id)->get();
    }
}
