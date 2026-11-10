<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Services;

use App\Auth\Services\HasherService;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HasherService::class)]
class HasherServiceTest extends TestCase
{
    public function testPass()
    {
        $password = '123123';
        $hasher = new HasherService();
        $hash = $hasher->hash($password);
        $this->assertTrue($hasher->validate($password, $hash));
        $this->assertFalse($hasher->validate('password', $hash));
    }

    public function testPassEmpty()
    {
        $password = '';
        $hasher = new HasherService();
        $this->expectException(InvalidArgumentException::class);
        $hasher->hash($password);
    }
}
