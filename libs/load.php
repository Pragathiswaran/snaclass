<?php

function load_temaplte($name){
    include $_SERVER['DOCUMENT_ROOT']."/snaclass/_template/$name.php";
}

function validate_user($username , $password ){
    if($username == 'praga@gmail.com' and $password == 'password'){
        return true;
    } else {
        return false;
    }
}

function signup ($user, $email, $pass){
    $servername = "172.31.96.1";
    $username = "praga";
    $password = "password";
    $dbname = "snaclass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // print_r($conn);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    } 
    $result = false;
 
    $sql = "INSERT INTO signin (username,email,password,blocked,active) 
        VALUE ('$user','$email','$pass',0,1)";
    $result = false;
    if($conn->query($sql) === true){
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $result = false;
    }

    $conn->close();
    return $result;
}