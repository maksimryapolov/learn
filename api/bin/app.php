<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Console\HomeCommand;
use Symfony\Component\Console\Application;

$cli = new Application('cli');

$container = $container = (require __DIR__ . '/../config/container.php');

$cli->addCommand($container->get(HomeCommand::class));
$cli->run();
