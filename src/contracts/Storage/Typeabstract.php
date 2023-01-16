<?php 
namespace Hekal\Mvc\Contracts\Storage;
abstract class Typeabstract{
    // public abstract function start():void;
    public  abstract function set(string $key,mixed $value,int $time,$path);
    public  abstract function get(string $key):mixed;
    public  abstract function destroy(string $key):void;
    
} 
