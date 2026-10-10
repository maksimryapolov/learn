<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setRiskyAllowed(true) // ⚠️ Изменено на true, так как вставка strict_types считается рискованным правилом
    ->setRules([
        '@PSR12' => true,

        // Автоматическая сортировка импортов по алфавиту
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'function', 'const'],
        ],

        'declare_strict_types' => true,
    ])
    ->setCacheFile('./var/.php-cs-fixer.cache')
    ->setFinder(
        (new Finder())
            ->in(__DIR__)
            ->exclude([
                'var',
                'vendor',
                'bootstrap/cache',
                'storage',
            ])
            ->notPath([
                // Здесь можно перечислить отдельные файлы-исключения, если понадобятся
            ])
    )
;
