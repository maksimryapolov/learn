<?php

declare(strict_types=1);

namespace App\Http\Actions;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseAction implements RequestHandlerInterface
{
    public function __construct(
        private ResponseFactoryInterface $factory
    ) {
    }

    public function jsonResponse(mixed $data, int $status = 200): ResponseInterface
    {
        $response = $this->factory->createResponse($status);
        $response->getBody()->write((string)json_encode($data));
        return $response->withHeader('Content-type', 'application/json');
    }
}
