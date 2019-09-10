<?php


namespace App\Models\Repository\CategoryRepository;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function update(Category $category, array $params): Category;
}