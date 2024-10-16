<?php

class Database{
    public static $conn = null;

    public static function getConnection(){
        if(Database::$conn == null){
            $servername = set_config('DB_SERVER');
            $username = set_config('DB_USERNAME');
            $password = set_config('DB_PASSWORD');
            $dbname = set_config('DB_NAME');

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                echo $password ? $password : '';
                die("Connection Failed ". $conn->connect_error);
            } else {
                Database::$conn = $conn;
                return Database::$conn;
            }
        } else {
            return Database::$conn;
        }
    }
}
