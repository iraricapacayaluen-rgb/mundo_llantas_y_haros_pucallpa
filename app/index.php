<?php
// app/index.php

// Mostrar errores para debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar configuración
require_once __DIR__ . '/config/config.php';

// Autoloader para cargar clases automáticamente
spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/core/',
        __DIR__ . '/controllers/',
        __DIR__ . '/models/'
    ];
    
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Iniciar aplicación
$app = new App();
$app->run();