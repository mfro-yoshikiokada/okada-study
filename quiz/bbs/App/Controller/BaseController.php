<?php

namespace bbs\App\Controller;

abstract class BaseController
{
    protected function view(string $path, array $data = []): void
    {
        extract($data);
        require_once $path;
    }

    protected function redirect(string $path): void
    {
        header("Location:/quiz/bbs/public{$path}");
        exit();
    }
}
