<?php


declare(strict_types=1);

namespace Casino\Infrastructure\Autoloader;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            $file = str_replace('Casino', __DIR__ . '/../..', $file);
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}

// Casino/Domain/Games/Blackjack/Blackjack
// => src/Infrastructure/Autoloader/../../Domain/Games/Blackjack/Blackjack.php
//=> src/Infrastructure/Autoloader/Infrastructure/src/Domain/Games/Blackjack/Blackjack.php