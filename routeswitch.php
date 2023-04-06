<?php

abstract class RouteSwitch
{
    protected function home()
    {
        require __DIR__ . '/home.php';
    }

    protected function cardapio()
    {
        require __DIR__ . '/cardapio.php';
    }

    protected function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/erro.html';
    }
}
