<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;

class UserService
{
    public function storeUser(UserDTO $userDTO)
    {
        $user = new User();

        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = bcrypt($userDTO->password);
        $user->save();

        return $user;
    }
}
