<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use App\Models\Repository\ProductRepository\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UpdateAction extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(Request $request, $id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $this->productRepository->update($product, $request->all());

        return response()->json(['success' => 'Product updated'], 200);
    }
}
