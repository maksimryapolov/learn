<?php

namespace App\Auth\Entities\User;

enum StatusEnum: string
{
    case wait = 'WAIT';
    case active = 'ACTIVE';

    public function isWait(): bool
    {
        return $this == self::wait;
    }

    public function isActive(): bool
    {
        return $this == self::active;
    }
}