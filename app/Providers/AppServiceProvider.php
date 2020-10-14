<?php

namespace App\Providers;

use App\Service\CustomerService;
use App\Service\impl\CustomerServiceImpl;
use App\Service\impl\ProductServiceImpl;
use App\Service\impl\SalesOrderDetailServiceImpl;
use App\Service\impl\SalesOrderServiceImpl;
use App\Service\ProductService;
use App\Service\SalesOrderDetailService;
use App\Service\SalesOrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CustomerService::class, CustomerServiceImpl::class);
        $this->app->bind(ProductService::class, ProductServiceImpl::class);
        $this->app->bind(SalesOrderService::class, SalesOrderServiceImpl::class);
        $this->app->bind(SalesOrderDetailService::class, SalesOrderDetailServiceImpl::class);
    }
}
