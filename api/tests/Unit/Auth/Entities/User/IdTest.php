<?php

declare(strict_types=1);

namespace Test\Unit\Auth\Entities\User;

use App\Auth\Entities\User\Id;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

#[CoversClass(Id::class)]
class IdTest extends TestCase
{
    public function testValue()
    {
        $uuid = Uuid::v7()->toString();
        $id = new Id($uuid);
        $this->assertEquals($uuid, $id->value);
    }

    public function testValid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('34124');
    }
}
