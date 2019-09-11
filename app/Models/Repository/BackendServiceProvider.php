<?php


namespace App\Models\Repository;


use App\Models\Repository\CategoryRepository\CategoryRepository;
use App\Models\Repository\CategoryRepository\CategoryRepositoryInterface;
use App\Models\Repository\ProductRepository\ProductRepository;
use App\Models\Repository\ProductRepository\ProductRepositoryInterface;
use App\Models\Repository\UserRepository\UserRepository;
use App\Models\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}