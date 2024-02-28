<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $user): User;
    public function findById(string $id);

    public function update(User $user, array $fields);

    public function delete(User $user);
}
