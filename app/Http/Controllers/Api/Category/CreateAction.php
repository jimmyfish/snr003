<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CreateAction extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'varian' => 'required',
            'volume' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 500);
        }

        $category = Category::create($request->all());

        return response()->json(['success' => $category->varian . ' created'], 200);
    }
}
