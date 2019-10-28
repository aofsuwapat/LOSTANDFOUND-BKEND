<?php

abstract class BaseModel{
    public static $db;
    protected $host="localhost";
    
    // protected $username="root";
    // protected $password="root123456";
    // protected $db_name="revelsoft_seem";

    protected $username="root";
    protected $password="12345678";
    protected $db_name="lostandfound";

    function __construct(){
        static::$db = mysqli_connect($host, $username, $password, $db_name);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
}
?>