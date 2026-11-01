<?php

declare(strict_types=1);

namespace App\Auth\Services;

use Webmozart\Assert\Assert;

class HasherService
{
    public function hash(string $password, string $hash = PASSWORD_DEFAULT): string
    {
        $password = Assert::stringNotEmpty($password);
        return password_hash($password, $hash);
    }

    public function validate(string $password, string $passwordHash): bool
    {
        if ($password === '' || $passwordHash === '') {
            return false;
        }

        return password_verify($password, $passwordHash);
    }
}
