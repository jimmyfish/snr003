<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CreateAction extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json('created', 200);
    }
}
