<?php

namespace App\Http\Controllers\Api\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListAction extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::all();

        return response()->json($products);
    }
}
