<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use DateTimeImmutable;
use Webmozart\Assert\Assert;

class Token
{
    public private(set) string $value {
        set {
            $this->value = Assert::stringNotEmpty($value);
        }
    }

    public function __construct(
        string $value,
        private DateTimeImmutable $expires
    ) {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getExpires(): DateTimeImmutable
    {
        return $this->expires;
    }
}
