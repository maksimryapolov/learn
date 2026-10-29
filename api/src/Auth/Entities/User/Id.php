<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use Webmozart\Assert\Assert;

final class Id
{
    public private(set) string $value {
        set {
            $this->value = Assert::uuid($value);
        }
    }

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
