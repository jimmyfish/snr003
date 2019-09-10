<?php


namespace App\Models\Repository\CategoryRepository;


use App\Models\Category;
use App\Models\Repository\Traits\ParamsChecker;

class CategoryRepository implements CategoryRepositoryInterface
{
    use ParamsChecker;

    private $updateFields = [
        'name',
        'varian',
        'volume',
    ];

    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function update(Category $category, array $params): Category
    {
        $data = [];

        foreach ($this->updateFields as $field) {
            if ($this->doParamsExist($field, $params)) {
                $data[$field] = $params[$field];
            }
        }

        $category->update($data);

        return $category->refresh();
    }
}