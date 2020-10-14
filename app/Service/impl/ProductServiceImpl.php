<?php

namespace App\Service\impl;

use App\Repository\ProductRepository;
use App\Service\ProductService;


class ProductServiceImpl implements ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list($array = null)
    {
        if ($array == null) {
            return $this->repository->all();
        }
        return $this->repository->all($array);
    }

    public function create($array)
    {
        return $this->repository->create($array);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function update($array, $id)
    {
        return $this->repository->update($array, $id);
    }
}
