<?php


namespace App\Repository;


use App\Models\SalesOrderDetail;

class SalesOrderDetailRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return SalesOrderDetail::class;
    }
}
