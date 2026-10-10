<?php

declare(strict_types=1);

use DI\Container;
use Slim\App;

return static function (App $app, Container $container) {
    $app->addErrorMiddleware($container->get('config')['debug'], false, false);
};
