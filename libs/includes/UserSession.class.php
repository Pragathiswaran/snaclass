<?php

class UserSession {

    public $conn, $uid, $data;

    public function __construct($token=null){
        $this->conn = Database::getConnection();
        if($token){
            $sql = "SELECT * FROM `session` WHERE `token` = '$token' LIMIT 1;";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $this->data = $row;
                $this->uid = $row['uid'];
            } else {
                throw new Exception('Session is invalid');
                // return false;
            }
        }
    }

    public function authentication($user, $pass){
        $username = User::login($user,$pass);
        $userid = new User($user);
        if($username){
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0,9999).$ip.$agent);
            $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
                    VALUES('$userid->id','$token', NOW(),'$ip','$agent','1')";
            if($conn->query($sql)){
                Session::set('session_token',$token);
                 return $token;
            } else {
                return false;
            }
        } else {
            throw new Exception('User is invalid');
        }
    }
 
    public function getUser($uid){
        return new User($uid);
    }

    public function authorization($token){
        $this->__construct($token);
        $time = $this->getRemainingTime();
        if($time and $this->data['active'] == 1){
            // print($time);
            if($_SERVER['HTTP_USER_AGENT'] == $this->data['user_agent']){
               if($_SERVER['REMOTE_ADDR'] == $this->data['ip']){
                    return true;
               } else return false;
            } else return false;
        } else return false;

         // throw new Exception('IP not match');
         // throw new Exception('User Agent not match');
         // throw new Exception('Time Invalid');
       
    }

    public function getRemainingTime(){
        $tokenCreatedTime = date('H:i:s',strtotime($this->data['login_time']));
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('H:i:s');

        // print($tokenCreatedTime . "\n");
        // print($currentTime);
        // echo "\n".$this->data['login_time'];
        $startTime = new DateTime($tokenCreatedTime);
        $endTime = new DateTime($currentTime);

        $interval = $startTime->diff($endTime);
        // print_r($interval);
        if ($interval->h > 1 || ($interval->h == 1 && $interval->i > 0)) {
            echo "\n time out \n";
            return false; 
        } 
        return true;
    }
}
