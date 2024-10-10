<?php

class User{
    private $conn;
    private $id;

    public function __construct($username){
        $this->conn = Database::getConnection();
        $sql = "SELECT * FROM signin WHERE username = '$username' OR id='$username' LIMIT 1;";
        $result =$this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        } else {
            throw new Exception('Username not Found!!!');
        }
    }
    public static function signup ($user, $email, $pass){
        $options = [
            'cost' => 9,
        ];
        $password = password_hash($pass,PASSWORD_DEFAULT,$options);
        $conn = Database::getConnection();
        $error = false;
        $sql = "INSERT INTO signin (username,email,password,active) VALUE ('$user','$email','$password',1)";
        if($conn->query($sql) == true){
            $error = false;
        } else {
            $error = $conn->error;
        }
        // $conn->close();
        return $error;
    }

    public static function login($user, $pass){
        $conn = Database::getConnection();
        $sql = "SELECT * FROM signin WHERE username = '$user'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
           
            if(password_verify($pass,$row['password'])){
                // return true
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function __call($method, $args){
        $property = preg_replace("/[^0-9a-zA-Z]/","",substr($method,3));
        $property = strtolower(preg_replace('/\B([A-Z])/','_$1',$property));

        if(substr($method,0,3) =='get'){
            return $this->_get_data($property);
        } else if (substr($method,0,3) =='set'){
            return $this->_set_data($property,$args[0]);
        }
    }
    private function _get_data($var){
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }

        $sql = "SELECT $var FROM user WHERE id = '$this->id'";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }

    private function _set_data($var, $value){
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }

        $sql = "UPDATE user SET $var='$value' WHERE id = '$this->id';";
        $result = $this->conn->query($sql);

        print_r($result);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function logout(){
        Session::destroy();
    }
}
