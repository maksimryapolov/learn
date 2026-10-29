<?php

declare(strict_types=1);

namespace App\Auth\Services;

use Webmozart\Assert\Assert;

class HasherService
{
    public function hash(string $password): string
    {
        $password = Assert::stringNotEmpty($password);
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function validate(string $password, string $hash): bool
    {
        if ($password === '' || $hash === '') {
            return false;
        }

        return password_verify($password, $hash);
    }
}
