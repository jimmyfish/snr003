<?php

namespace App\Http\Controllers\Api\Sales;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryAction extends Controller
{
    public function __invoke(Request $request)
    {
        $sales = Sales::all();

        return response()->json($sales, 200);
    }
}
