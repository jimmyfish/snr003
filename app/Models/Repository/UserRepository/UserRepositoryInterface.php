<?php


namespace App\Models\Repository\UserRepository;


use App\Models\User;

interface UserRepositoryInterface
{
    public function update(User $user, array $params): User;
}