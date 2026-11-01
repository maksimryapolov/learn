<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Entities\User;

use App\Auth\Entities\User\Email;
use App\Auth\Entities\User\Id;
use App\Auth\Entities\User\User;
use App\Auth\Services\HasherService;
use App\Auth\Services\Tokenizer;
use DateInterval;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class UserTest extends TestCase
{
    public function testCreate()
    {
        $email = new Email('test@bk.ru');
        $dateTime = new DateTimeImmutable('2024-01-15 10:00:00');
        $interval = new DateInterval('PT1H');
        $idValue = Uuid::v7()->toString();
        $hasher = new HasherService();
        $passwordHash = $hasher->hash('123312');
        $token = (new Tokenizer($interval))->generate($dateTime);

        $user = new User(
            new Id($idValue),
            $email,
            $passwordHash,
            $dateTime,
            $token
        );

        $this->assertEquals($idValue, $user->getId()->getValue());
        $this->assertEquals('test@bk.ru', $user->getEmail()->getValue());
        $this->assertTrue($hasher->validate('123312', $passwordHash));
        $this->assertEquals(new DateTimeImmutable('2024-01-15 10:00:00'), $user->getDateCreate());
        $this->assertEquals($user->getToken()->getValue(), $token->getValue());
    }
}
