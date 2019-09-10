<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailAction extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (is_null($id)) {
            return response()->json(['error' => 'No products'], 500);
        }

        $categoryDetails = Product::where(['category_id' => $id])
            ->with('category')
            ->get();

        return response()->json($categoryDetails, 200);
    }
}
