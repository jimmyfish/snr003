<?php


namespace App\Models\Repository\ProductRepository;


use App\Models\Product;

interface ProductRepositoryInterface
{
    public function update(Product $category, array $params): Product;
}