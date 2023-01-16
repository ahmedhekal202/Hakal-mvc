<?php
namespace Hekal\Mvc\Contracts\Database;
interface DatabaseInterface{
    public  function  select(string $columns="="):object;
    public  function  insert(array $data):object;
    public  function delete():object;
    public  function ubdate(array $data):object;
    public function all():array;
    public function first():array;
    public function excute():int;
    public static function table (string $table):object;

}