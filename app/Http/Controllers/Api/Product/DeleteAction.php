<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteAction extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $product->delete();

        return response()->json(['success' => $product->part_number . ' deleted'], 200);
    }
}
