<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CreateAction extends Controller
{
    public function __invoke(Request $request)
    {
        $category = Category::find($request->category_id);

        if (is_null($category)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'part_number' => 'required',
            'het' => 'required|numeric',
            'created_at' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 500);
        }

        try {
            $product = $category->products()->create($request->all());
        } catch (QueryException $exception) {
            $errorCode = $exception->errorInfo[1];
            if($errorCode == 1062){
                return response()->json(['error' => 'Duplicate entry'], 500);
            }
        }

        return response()->json(['success' => $product->part_number . ' created'], 200);
    }
}
