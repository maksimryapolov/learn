<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Entities\User;

use App\Auth\Entities\User\Email;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Email::class)]
class EmailTest extends TestCase
{
    public function testValue()
    {
        $email = new Email('maks.riapolov@yandex.ru');
        $this->assertEquals('maks.riapolov@yandex.ru', $email->value);
    }

    public function testEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new Email('maks.riapolov@yandex');
    }

    public function testlower()
    {
        $email = new Email('MAKS.riapolov@yandex.ru');
        $this->assertEquals('maks.riapolov@yandex.ru', $email->value);
    }
}
