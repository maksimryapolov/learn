<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Entities\User;

use App\Auth\Entities\User\Token;
use DateInterval;
use DateTimeImmutable;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Token::class)]
class TokenTest extends TestCase
{
    public function testExpires()
    {
        $dateTime = new DateTimeImmutable();
        $interval = new DateInterval('PT1H');

        $token = new Token('asdasdasdasd', $dateTime->add($interval));
        $this->assertTrue($dateTime < $token->getExpires());
        $this->assertEquals('asdasdasdasd', $token->getValue());
    }

    public function testException()
    {
        $dateTime = new DateTimeImmutable();
        $interval = new DateInterval('PT1H');

        $this->expectException(InvalidArgumentException::class);
        $token = new Token('', $dateTime->add($interval));
    }

    public function testFaileExpected()
    {
        $dateTime = new DateTimeImmutable();
        $interval = new DateInterval('PT1H');

        $token = new Token('asdasdasdasd', $dateTime->sub($interval));
        $this->assertFalse($dateTime < $token->getExpires());
    }
}
