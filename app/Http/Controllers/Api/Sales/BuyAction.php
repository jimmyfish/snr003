<?php

namespace App\Http\Controllers\Api\Sales;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyAction extends Controller
{
    public function __invoke(Request $request)
    {
        $product = Product::find($request->product_id);

        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $product->sales()->create($request->all());

        return response()->json(['success' => 'Buy successful'], 200);
    }
}
