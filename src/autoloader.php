<?php

function autoload(string $class): bool
{
    $dirs = [
        CONTROLLERS_DIR,
        MODELS_DIR . 'entities/',
        MODELS_DIR . 'databaseEntities/',
    ];

    foreach ($dirs as $dir) {
        $file = $dir . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return true;
        }
    }

    return false;
}
