<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

final class Email
{
    public private(set) string $value {
        set {
            $lowercased = mb_strtolower($value);

            /** @throws InvalidArgumentException */
            $this->value = Assert::email($lowercased);
        }
    }

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
