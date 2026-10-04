<?php

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register([self::class, 'autoload']);
    }

    public static function autoload(string $class): void
    {
        $prefix = 'App\\';

        if (strncmp($class, $prefix, 4) !== 0) {
            return;
        }

        $relativeClass = substr($class, 4);
        $file = __DIR__ . '/../' . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }
}
