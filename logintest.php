<?php

include 'libs/load.php';

$userSession = new UserSession();
$SessionToken = Session::get('session_token');
// printf($SessionToken);
if(!empty($SessionToken)){
    $username = Session::get('user_session');
    print "Welcome back $username";
    $authUser = $userSession->authorization($SessionToken);
    // print_r($authUser == true ? $authUser : 'false');
    if(!$authUser){
        echo "Session invalid";
        Session::unset();
    }
    // $userSession->getRemainingTime();
} else {
    echo "Login failed try to login again ";
    $usertoken = $userSession->authentication('pragathis','password');
    // printf($usertoken);
    if(isset($usertoken)){
        echo 'Login Success';
        // print_r($userSession);
        $userSession1 = new UserSession($usertoken);
        if($userSession1->uid){
            $username1 = new User($userSession1->uid);
            Session::set('user_session',$username1->username);
        } else {
            echo ' user ID not found ';
        }
    } else {
        echo 'Login failed';
    }
}