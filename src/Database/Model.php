<?php 
namespace Hekal\Mvc\Database;

use Hekal\Mvc\Contracts\Database\DatabaseInterface;
use Hekal\Mvc\Env\EnvDash;
use Hekal\Mvc\Database\DB;

class Model implements DatabaseInterface {
    private  object $connection ;
    private  string $sql;
    private static string $table;

  public function __construct()
  {
    $this->connection=mysqli_connect(EnvDash::env('DB_CONNECTION'),EnvDash::env('DB_USER'),EnvDash::env('DB_PASSWORD'),EnvDash::env('DB_NAME'));
      
  }
  // ***************************table
  public static function table (string $table):object
  {
    self::$table=$table;
    return new static;
  } 
  // ***************************** select
  public  function select(string $columns="*") :object
  {
    $table=self::$table;
    $this->sql=("SELECT $columns FROM $table");
    // print_r(self::$sql) ;
    // die;
    return $this;

  }  
  //*************************where */
  public function where(string $column , string $value,$operator='=')
  {
     $this->sql.=" WHERE $column $operator '$value'";
    return $this->sql;

  }
   // ************************* select all raws 
  public function all() :array
  {
    $qurey=mysqli_query($this->connection,$this->sql);
    return mysqli_fetch_all($qurey,MYSQLI_ASSOC);

  }
  // ************************* select one raw or the first raw
  public function first():array
  {
    $qurey=mysqli_query($this->connection,self::$sql);
    return mysqli_fetch_assoc($qurey);


  }
  // ***********************delete 
  public  function delete():object
  {
    $table=self::$table;
    $this->sql="DELETE FROM `$table` ";
    return $this;
  }
  // ********************* do the method
  public function excute():int
  {
    mysqli_query($this->connection,$this->sql);
    return mysqli_affected_rows($this->connection);
  }
  // ************************ insert
  public function insert(array $data):object
  {
    //INSERT INTO name_table (column1,column2,.....)VALUES(value1,value2,.......);
    $values="";
    $columns="";
    foreach($data as $key=>$value){
        $values .="'$value' ,";
        $columns .="$key ,";

    }
    $values =rtrim($values,",");
    $columns =rtrim($columns,",");
    $table=DB::$table;
    $this->sql="INSERT INTO $table($columns)VALUES($values)";
    // echo $this->sql;
    // die;
    return $this;

  }
  // ************* update
  public  function ubdate(array $data):object
  {
    //UPDATE table_name SET coulumn1='value1' ,column2='value2 '
   $raw="";
   foreach($data as $key=>$value){
       $raw .= "$key='$value' ,";
   }
    $raw =rtrim($raw,",");
    $table=DB::$table;
    $this->sql="UPDATE $table SET $raw" ;
    // echo $this ->sql;
    
   return $this;
 
  }

}