<?php


namespace App\Repository;


use App\Models\Product;

class ProductRepository extends BaseRepository
{

    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return Product::class;
    }
}
