<?php

class Database{
    public static $conn = null;

    public static function getConnection(){
        if(Database::$conn == null){
            $servername = "localhost";
            $username = "praga";
            $password = "password";
            $dbname = "snaclass";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
                Database::$conn = $conn;
                return Database::$conn;
            }
        } else {
            return Database::$conn;
        }
    }

}
