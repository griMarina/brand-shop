<?php

function autoload($class)
{
    $sources = array(
        CONTROLLERS_DIR . $class . '.php',
        MODELS_DIR . 'entities/' . $class . '.php',
        MODELS_DIR . 'databaseEntities/' . $class . '.php'
    );

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        }
    }
}
