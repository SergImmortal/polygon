<?php

class Application
{
    public function run()
    {
        print_r('Application start!' . PHP_EOL); //debug
        $router = new Router($_SERVER['REQUEST_URI']);
        print_r($router->getController() . PHP_EOL); //debug
        print_r($router->getAction() . PHP_EOL); //debug

    }
}