<?php


namespace App\Service\impl;

use App\Repository\SalesOrderDetailRepository;
use App\Repository\SalesOrderRepository;
use App\Service\SalesOrderService;

class SalesOrderServiceImpl implements SalesOrderService
{
    protected $repository;
    protected $detailRepository;

    public function __construct(SalesOrderRepository $repository, SalesOrderDetailRepository $detailRepository)
    {
        $this->repository = $repository;
        $this->detailRepository = $detailRepository;
    }

    public function list($array = null)
    {
        if ($array == null){
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
        }
    }

    public function getOrderDetailById($id)
    {
        return $this->repository->findOrderById($id);
    }

    public function update($array, $id)
    {
        return $this->repository->update($array, $id);
    }

    public function createOrder($array)
    {
        $sales = $this->repository->create([
            'customer_id' => $array->get('customer_id')
        ]);

        $detail = $array->get('products_id');
        foreach ($detail as $item) {
            $details[] = $this->detailRepository->create([
                'product_id' => $item,
                'order_id' => $sales->id
            ]);
        }

        $sales->orderDetail()->saveMany($details);
    }
}
