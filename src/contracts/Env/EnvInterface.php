<?php 
namespace Hekal\Mvc\Contracts\Env;
interface EnvInterface{
    public static function load():array;
    public static function env(string $key):mixed;
}