<?php

namespace System;


use System\Exceptions\NotFoundException;

/**
 * @method static post(string $string, string $class)
 * @method static get(string $string, string $class)
 */
class Router
{

    private static array $routes = [];

    public static function __callStatic($name, $arguments): void
    {
        self::$routes[$name][$arguments[0]] = $arguments[1];
    }

    public static function run(): Controller
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri = $_SERVER['REQUEST_URI'];

        if ($method === 'get') {
            $explodeUri = explode('?', $_SERVER['REQUEST_URI']);
            $uri = $explodeUri[0];
        }

        foreach (self::$routes[$method] as $route => $controller) {
            $pregExp = "/^" . str_replace('/', '\/', '/' . $route ) . "$/";

            if (preg_match($pregExp, $uri)) {
                return new $controller;
            }
        }

        throw new NotFoundException('Not found', 404);
    }
}