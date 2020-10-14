<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Service\CustomerService;
use App\Service\ProductService;
use App\Service\SalesOrderService;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    protected $service;
    protected $productService;
    protected $customerService;

    public function __construct(SalesOrderService $service, ProductService $productService, CustomerService $customerService)
    {
        $this->service = $service;
        $this->productService = $productService;
        $this->customerService = $customerService;
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = $this->service->list();
        return view('sales.index', compact('sales'));
    }


    public function create()
    {
        $products = $this->productService->list();
        $customers = $this->customerService->list();
        return view('sales.create', compact('products', 'customers'));
    }


    public function store(SalesRequest $request)
    {
        $this->service->createOrder($request);
        return redirect('sales');
    }


    public function show($id)
    {
        $sales = $this->service->get($id);
        return view('sales.detail', compact('sales'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect('sales');
    }
}
