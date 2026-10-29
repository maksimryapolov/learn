<?php

declare(strict_types=1);

namespace App\Http\Actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Webmozart\Assert\Assert;

final class HomeAction extends BaseAction
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $dateTime = new \DateTimeImmutable();
        // $interval = new \DateInterval('PH1');
        echo "<pre>";
        var_dump(
            $token = bin2hex(random_bytes(32)),
            $hash = hash('sha256', $token)
        );
        echo "<pre>";

        return $this->jsonResponse(['test' => Assert::email('maks@bk.ru')]);
    }
}
