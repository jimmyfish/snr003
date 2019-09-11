<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailAction extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $customer = User::find($id);

        if (is_null($customer)) {
            return response()->json(['error' => 'User not found'], 500);
        }

        return response()->json($customer, 200);
    }
}
