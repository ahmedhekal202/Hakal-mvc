<?php
namespace Hekal\Mvc\Route;

use Hekal\Mvc\contracts\Route\RouteInterface;

class RouteDash implements RouteInterface
{
    public static $routes;
    public static function get(string $url,array $action)
    {
        self::$routes[$url]=$action;


    }

}