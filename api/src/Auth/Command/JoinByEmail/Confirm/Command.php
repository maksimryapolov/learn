<?php

declare(strict_types=1);

namespace App\Auth\Command\JoinByEmail\Confirm;

class Command
{
    public function __construct(
        public readonly string $token
    ) {
    }
}
