<?php

class User{
    private $conn;
    public static function signup ($user, $email, $pass){
        $password = md5($pass);
        $conn = Database::getConnection();
        $error = false;
        $sql = "INSERT INTO signin (username,email,password,active) 
            VALUE ('$user','$email','$password',1)";
        if($conn->query($sql) == true){
            $error = false;
        } else {
            $error = $conn->error;
        }
        // $conn->close();
        return $error;
    }

    public static function login($user, $pass){
        $password = md5($pass);
        $conn = Database::getConnection();
        $sql = "SELECT * FROM signin WHERE username = '$user'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
           
            if($row['password'] == $password){
                // return true
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
}
