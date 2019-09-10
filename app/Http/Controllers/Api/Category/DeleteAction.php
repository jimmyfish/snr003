<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteAction extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Product not found'], 500);
        }

        $category->delete();

        return response()->json(['success' => $category->name . ' deleted'], 200);
    }
}
