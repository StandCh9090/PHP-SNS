<?php

namespace App\Core;

class View
{
    public static function render(string $view, array $data = [], string $title = 'PHP SNS'): void
    {
        extract($data);

        ob_start();
        require __DIR__ . '/../../views/' . $view . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../views/layout.php';
    }
}
