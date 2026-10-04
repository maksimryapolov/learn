<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// TODO: может вынести в свой Kernel
$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/../config/dependencies.php');
$container = $builder->build();

$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware($container->get('config')['debug'], false, false);

(require __DIR__ . '/../config/routes/api.php')($app);

$app->run();
