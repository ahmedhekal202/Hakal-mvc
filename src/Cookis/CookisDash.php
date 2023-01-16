<?php 
namespace Hekal\Mvc\Cookis;

use Hekal\Mvc\Contracts\Storage\Typeabstract;

class CookisDash extends Typeabstract{
    public  function set(string $key,mixed $value,int $time=3600*24,$path="/"):void
    {
        // echo "set cookies";
        setcookie($key,$value,time()+$time,$path);

    }
    public  function get(string $key):mixed
    {
        return $_COOKIE[$key];
    }
    public  function destroy(string $key):void
    {
        setcookie($key,"",time()-100,'/');
        unset($_COOKIE[$key]);
        
    }
}