<?php 
namespace Hekal\Mvc\Env;
// use Hekal\Mvc\Contracts\Env;

use Exception;
use Hekal\Mvc\Contracts\Env\EnvInterface;

class EnvDash implements EnvInterface {
    public static function load():array
    {
        if(file_exists('../env.json')){
            $data_json=file_get_contents('../env.json');
            return json_decode($data_json,true);
        }
        else{
            echo "file is not exists";

        }
    }
    public static function env(string $key):mixed
    {
        $data=self::load();
        // echo "<pre>";
        // print_r($data);
        // var_dump($data[$key]);

        // die;
        if(array_key_exists($key,$data)){
            return $data[$key];

        }
        else
        {
            // return"$key is not exists";
            throw new Exception("ENV is not found");
        }
        // return"$key is not exists";

    }

}