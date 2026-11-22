<?php

declare(strict_types=1);

namespace App\Auth\Command\JoinByEmail\Confirm;

use App\Auth\Command\JoinByEmail\Confirm\Command;
use App\Auth\Entities\User\StatusEnum;
use App\Auth\Entities\User\Token;
use App\Auth\Entities\User\UserRepositoryInterface;
use DateTimeImmutable;
use DomainException;
use Exception;

class Handler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function handle(Command $command): void
    {
        $user = $this->userRepository->findByToken($command->token);

        if (!$user) {
            throw new Exception('Invalid token: ' . $command->token);
        }

        $user->confirmJoin($command->token, new DateTimeImmutable());
    }
}
