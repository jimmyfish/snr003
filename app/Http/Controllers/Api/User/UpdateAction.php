<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UpdateAction extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request)
    {
        $user = $request->user();

        if (!is_null($request->password)) {
            $request['password'] = bcrypt($request->password);
        }

        $this->userRepository->update($user, $request->all());

        return response()->json(['success' => 'Profile updated'], 200);
    }
}
