<?php


namespace App\Models\Repository\UserRepository;


use App\Models\Repository\Traits\ParamsChecker;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    use ParamsChecker;

    private $updateFields = [
        'name',
        'email',
        'password',
    ];

    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function update(User $user, array $params): User
    {
        $data = [];

        foreach ($this->updateFields as $field) {
            if ($this->doParamsExist($field, $params)) {
                $data[$field] = $params[$field];
            }
        }

        $user->update($data);

        return $user->refresh();
    }
}