<?php

declare(strict_types=1);

namespace App\Auth\Entities\User;

use App\Auth\Entities\User\Email;
use App\Auth\Entities\User\Id;
use DateTimeImmutable;

class User
{
    public function __construct(
        private Id $id,
        private Email $email,
        private string $password,
        private DateTimeImmutable $dateCreate,
        private Token $token
    ) {
    }

    public function getid(): Id
    {
        return $this->id;
    }

    public function getemail(): Email
    {
        return $this->email;
    }

    public function getpassword(): string
    {
        return $this->password;
    }

    public function getdateCreate(): DateTimeImmutable
    {
        return $this->dateCreate;
    }

    public function gettoken(): Token
    {
        return $this->token;
    }
}
