<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use App\Models\Repository\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateAction extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(Request $request, $id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $this->categoryRepository->update($category, $request->all());

        return response()->json(['success' => 'Product updated'], 200);
    }
}
