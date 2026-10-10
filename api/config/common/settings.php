<?php

declare(strict_types=1);


return [
    'config' => [
        'debug' => (bool)getenv('APP_DEBUG'),
        'console' => [
            'command' => [
                \App\Console\HomeCommand::class
            ]
        ]
    ],
];
