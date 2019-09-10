<?php


namespace App\Models\Repository\ProductRepository;


use App\Models\Product;
use App\Models\Repository\Traits\ParamsChecker;

class ProductRepository implements ProductRepositoryInterface
{

    use ParamsChecker;

    private $updateFields = [
        'part_number',
        'het',
        'category_id',
    ];

    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function update(Product $product, array $params): Product
    {
        $data = [];

        foreach ($this->updateFields as $field) {
            if ($this->doParamsExist($field, $params)) {
                $data[$field] = $params[$field];
            }
        }

        $product->update($data);

        return $product->refresh();
    }
}