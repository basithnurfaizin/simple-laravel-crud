<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Service\CustomerService;

class CustomerController extends Controller
{

    protected $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = $this->service->list();
        return view('customer.index', compact('customers'));
    }


    public function create()
    {
        return view('customer.create');
    }


    public function store(CustomerRequest $request)
    {
        $this->service->create($request->all());
        return redirect('customer');
    }

    public function show($id)
    {
        $customer = $this->service->get($id);
        return view('customer.detail', compact('customer'));
    }


    public function edit($id)
    {
        $customer = $this->service->get($id);
        return view('customer.edit', compact('customer'));
    }


    public function update(CustomerRequest $request, $id)
    {
        $this->service->update($request->all(), $id);
        return redirect('customer');
    }


    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect('customer');
    }
}
