<?php

namespace App\Models;

class Error
{
    private function render($code)
    {
        match ($code) {
            404 => include('../app/views/errors/404.php'),
            500 => include('../app/views/errors/500.php'),
            default => include('../app/views/errors/404.php'),
        };
    }

    public function error404()
    {
        $this->render(404);
    }

    public function error500()
    {
        $this->render(500);
    }
}
