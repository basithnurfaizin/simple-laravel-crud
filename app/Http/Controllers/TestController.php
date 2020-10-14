<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use App\Repository\SalesOrderRepository;
use App\Service\CustomerService;
use Illuminate\Http\Request;

class TestController extends Controller
{

    protected $repository;

    protected $service;

    public function __construct(SalesOrderRepository $repository, CustomerService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $salesDetail = SalesOrderDetail::with('product')->get();

        $order = $this->repository->findOrderById(1);

        $orderCustomer = SalesOrder::with('customer')->get();

        $customer = $this->service->list();

        dd($order, $customer);
    }
}
