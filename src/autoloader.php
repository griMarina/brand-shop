<?php

function autoload($class)
{
    $sources = array(
        ROOT . '/models/entities/' . $class . '.php',
        ROOT . '/models/databaseEntities/' . $class . '.php'
    );

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        }
    }
}
