<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Services;

use App\Auth\Entities\User\Token;
use App\Auth\Services\Tokenizer;
use DateInterval;
use DateTimeImmutable;
use Override;
use PHPUnit\Framework\TestCase;

class TokenizerTest extends TestCase
{
    #[Override]
    public function setUp(): void
    {
        date_default_timezone_set('Europe/Moscow');
    }

    public function testValue()
    {
        $date = new DateTimeImmutable();
        $interval = new DateInterval('PT1H');

        $token = new Tokenizer($interval);
        $token = $token->generate($date);
        $this->assertInstanceOf(DateTimeImmutable::class, $token->getExpires());
        $this->assertInstanceOf(Token::class, $token);
    }
}
