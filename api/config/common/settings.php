<?php


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