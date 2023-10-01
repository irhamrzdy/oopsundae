<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class ApiController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(StoreUserRequest $req)
    {
        $user = $this->userService->storeUser($req->toDTO());
        return response()->json($user);
    }
}
