<?php 
namespace Hekal\Mvc\Session;

use Hekal\Mvc\Contracts\Storage\Typeabstract;

class SessionDash extends Typeabstract{
    public function start():void
    {
        session_start();
        //big rong
        // return new static ;
    }
    public  function set(string $key,mixed $value,int $time,$path):void
    {
        $this->start();
        // echo "set session";
        $_SESSION[$key]=$value;
    } 
    public  function get(string $key):mixed
    {
        return $_SESSION[$key];
    }
    public function destroy(string $key):void
    {
        session_destroy();
    }
}