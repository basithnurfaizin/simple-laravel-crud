<?php


namespace App\Repository;


use App\Models\Customer;

class CustomerRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return ['name', 'address'];
    }

    public function model()
    {
        return Customer::class;
    }
}
