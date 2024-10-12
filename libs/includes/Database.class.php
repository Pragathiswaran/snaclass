<?php

class Database{
    public static $conn = null;

    public static function getConnection(){
        if(Database::$conn == null){
            $servername = "192.168.1.3";
            $username = "praga";
            $password = "password";
            $dbname = "snaclass";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
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
