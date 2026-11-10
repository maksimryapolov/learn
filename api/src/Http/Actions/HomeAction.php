<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Auth\Entities\User\StatusEnum;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Webmozart\Assert\Assert;

final class HomeAction extends BaseAction
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $status = StatusEnum::active;
        echo "<pre>"; var_dump($status->isWait()); echo "<pre>";
        die;
        return $this->jsonResponse(['test' => Assert::email('maks@bk.ru')]);
    }
}
