<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Service\ProductService;


class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }


    public function index()
    {
        $products = $this->service->list();
        return view('product.index', compact('products'));
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(ProductRequest $request)
    {
        $product = $this->service->create($request->all());
        return redirect('product');
    }


    public function show($id)
    {
        $product = $this->service->get($id);
        return view('product.detail', compact('product'));
    }


    public function edit($id)
    {
        $product = $this->service->get($id);
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->service->update($request->all(), $id);
        return redirect('product');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect('product');
    }
}
