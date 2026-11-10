<?php

declare(strict_types=1);

namespace App\Auth\Command\JoinByEmail\Request;

use App\Auth\Command\JoinByEmail\Request\Command;
use App\Auth\Entities\User\Email;
use App\Auth\Entities\User\Id;
use App\Auth\Entities\User\User;
use App\Auth\Entities\User\UserRepositoryInterface as UserRepository;
use App\Auth\Services\HasherService;
use App\Auth\Services\Tokenizer;
use DateTimeImmutable;
use DomainException;
use Symfony\Component\Uid\Uuid;

class Handler
{
    public function __construct(
        private Command $command,
        private UserRepository $userRepository,
        private HasherService $hasher,
        private Tokenizer $tokenizer
    ) {
    }

    public function createUser(): void
    {
        $email = new Email($this->command->email);
        if($this->userRepository->getByEmail($email)) {
            throw new DomainException('Email is exsist');
        }

        $dateTime = new DateTimeImmutable();
        $token = $this->tokenizer->generate($dateTime);

        // Создать токен с будущей датой и временем истечения $this->tokenizer->generate();
        // хешируем и сохраняем в БД
        $user = new User(
            new Id(Uuid::v7()->toString()),
            $email,
            $this->hasher->hash($this->command->password),
            $dateTime,
            $token
        );

        $this->userRepository->add($user);

        // $this->em->flush();
        // $this->sender->send($email, $token);

    }
}
