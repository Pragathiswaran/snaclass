<?php

class UserSession {

    private $conn, $id, $uid, $data;

    public function authentication($user, $pass){
        $username = User::login($user,$pass);
        if($username){
            if(!$this->conn){
                $this->conn = Database::getConnection();
            }

            $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
                    VALUES()";
        } else {
            // throw new Exception('User is invalid');
            return false;
        }
    }
    public function __construct($id){
        $this->conn = Database::getConnection();
        $this->id = $id;
        $sql = "SELECT * FROM `session` WHERE `id` = '$id' LIMIT 1;";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid'];
        } else {
            throw new Exception('Session is invalid');
        }
    }

    public function getUser($uid){
        return new User($uid);
    }
}
