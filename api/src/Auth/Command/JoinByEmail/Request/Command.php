<?php

declare(strict_types=1);

namespace App\Auth\Command\JoinByEmail\Request;

class Command
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ) {
    }
}
