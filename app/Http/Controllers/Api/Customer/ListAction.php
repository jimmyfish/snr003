<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListAction extends Controller
{
    public function __invoke(Request $request)
    {
        $customers = User::where(['role' => 1])->get();

        return response()->json($customers, 200);
    }
}
