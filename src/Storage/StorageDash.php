<?php 
namespace Hekal\Mvc\Storage;

use Hekal\Mvc\Contracts\Storage\StorageInterface;
use Hekal\Mvc\Contracts\Storage\Typeabstract;
use Hekal\Mvc\Env\EnvDash;
use Hekal\Mvc\Session\SessionDash;
use Hekal\Mvc\Cookis\CookisDash;


class StorageDash extends Typeabstract implements StorageInterface{
    public  function type(){
        return EnvDash::env("STORAGE_DRIVER");

    }
    public  function set(string $key,mixed $value,int $time,$path='/')
    {
        // $type="Hekal\mvc\\".$this->type()."\\".$this->type()."Dash";
        $type=ucfirst($this->type());
        $type="Hekal\Mvc\\".$this->type()."\\".$this->type()."Dash";
      

        $type= new $type();
        $type->set($key,$value,$time,$path);

    } 
    public  function get(string $key):mixed 
    {
        $type=ucfirst($this->type());
        $type="Hekal\Mvc\\".$this->type()."\\".$this->type()."Dash";
      

        $type= new $type();
        $type->get($key);


    }
    public  function destroy(string $key):void
    {
        $type=ucfirst($this->type());
        $type="Hekal\Mvc\\".$this->type()."\\".$this->type()."Dash";
      

        $type= new $type();
        $type->destroy($key);

    }
    

}