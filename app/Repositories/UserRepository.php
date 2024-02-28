<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $user): User
    {
        return User::create($user);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function update(User $user, $fields)
    {
        $user->update($fields);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
