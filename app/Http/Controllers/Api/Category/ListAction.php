<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListAction extends Controller
{
    public function __invoke(Request $request)
    {
        $category = Category::all();

        return response()->json($category);
    }
}
