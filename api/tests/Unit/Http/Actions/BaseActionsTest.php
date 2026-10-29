<?php

declare(strict_types=1);

namespace Test;

use App\Http\Actions\BaseAction;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\ResponseFactory;

#[CoversClass(BaseAction::class)]
class BaseActionsTest extends TestCase
{
    #[DataProvider('getCases')]
    public function testResponse(mixed $expected, mixed $actual, int $code)
    {

        $responseFactory = new ResponseFactory();
        $baseAction = new class ($responseFactory) extends BaseAction {
            public function handle(ServerRequestInterface $request): ResponseInterface
            {
                return $this->jsonResponse([]);
            }
        };

        $response = $baseAction->jsonResponse($actual, $code);
        $this->assertEquals($expected, (string)$response->getBody());
        $this->assertEquals($code, $response->getStatusCode());
    }


    public static function getCases(): array
    {
        $class = new \stdClass();
        $class->response = "ok";

        return [
            'number' => ["22", 22, 200],
            'string' => ['"22"', '22', 201],
            'array'  => ['{"assert":"ok"}', ['assert' => 'ok'], 200],
            'class'  => ['{"response":"ok"}', $class, 200],
            'null'   => ['null', null, 404]
        ];
    }
}
