<?php

declare(strict_types=1);

namespace App\Auth\Services;

use App\Auth\Entities\User\Token;
use DateInterval;
use DateTimeImmutable;

class Tokenizer
{
    public function __construct(private DateInterval $dateInterval)
    {
    }

    public function generate(DateTimeImmutable $date): Token
    {
        $token = bin2hex(random_bytes(32));
        $hash = hash('sha256', $token);
        return new Token($hash, $date->add($this->dateInterval));
    }
}
