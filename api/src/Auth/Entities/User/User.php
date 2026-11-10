<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use App\Auth\Entities\User\Email;
use App\Auth\Entities\User\Id;
use App\Auth\Entities\User\StatusEnum;
use DateTimeImmutable;

class User
{
    public function __construct(
        private Id $id,
        private Email $email,
        private string $password,
        private DateTimeImmutable $dateCreate,
        private Token $token,
        private StatusEnum $status = StatusEnum::wait
    ) {
    }

    public function isWait(): bool
    {
        return $this->status->isWait();
    }

    public function isActive(): bool
    {
        return $this->status->isActive();
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDateCreate(): DateTimeImmutable
    {
        return $this->dateCreate;
    }

    public function getToken(): Token
    {
        return $this->token;
    }
}
