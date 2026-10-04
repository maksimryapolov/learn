<?php

$files = glob(__DIR__ . '/common/*.php');

$arr = array_map(
    static function($file) {
        return require_once $file;
    },
    $files
);

return array_merge_recursive(...$arr);
