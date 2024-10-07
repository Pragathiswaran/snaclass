<?php

class User{
    public static function signup ($user, $email, $pass){

        $conn = Database::getConnection();
        $error = false;
        $sql = "INSERT INTO signin (username,email,password,active) 
            VALUE ('$user','$email','$pass',1)";
        if($conn->query($sql) === true){
            $error = false;
        } else {
            $error = $conn->error;
        }
        // $conn->close();
        return $error;
    }
}
