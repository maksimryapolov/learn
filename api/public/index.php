<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// TODO: может вынести в свой Kernel

$container = (require __DIR__ . '/../config/container.php');

$app = AppFactory::createFromContainer($container);

(require __DIR__ . '/../config/middleware.php')($app, $container);
(require __DIR__ . '/../config/routes/api.php')($app);

$app->run();
