<?php

declare(strict_types=1);

namespace App\Http\Actions;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeAction implements RequestHandlerInterface
{
    public function __construct(
        private ResponseFactoryInterface $factory
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->factory->createResponse();
        $response->getBody()->write((string)json_encode(['result' => 'ok']));
        return $response->withHeader('Content-type', 'application/json');
    }
}
