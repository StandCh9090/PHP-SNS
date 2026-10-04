<?php

require __DIR__ . '/../app/Support/helpers.php';
require __DIR__ . '/../app/Core/Autoloader.php';

App\Core\Autoloader::register();

use App\Core\Session;

Session::start();

App\Core\Router::dispatch();
