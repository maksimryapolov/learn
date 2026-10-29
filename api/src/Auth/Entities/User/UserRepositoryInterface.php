<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use App\Auth\Entities\User\User;

interface UserRepositoryInterface
{
    public function add(User $user): void;
}
