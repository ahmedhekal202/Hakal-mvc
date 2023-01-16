<?php 
namespace Hekal\Mvc\contracts\Route;
interface RouteInterface{
    // public static $route;
    public static function get(string $url,array $action);
}