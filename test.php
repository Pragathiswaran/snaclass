<pre>
<?php include 'libs/load.php';

    // print_r($_POST); 
    // print_r($_SERVER); 
    // print_r(__FILE__);
    // $result = signup('pragathis','praga@gmail.com','Praga');
    // if($result){
    //     echo "Signup Success";
    // } else {
    //     echo "Signup Failed";
    // }

    $conn = Database::getConnection();
    // if($conn){
    //     print_r($conn);
    // } else {
    //     print_r("$conn");
    // }
    // $user = 'praga';
    // $pass = 'password';
    // $sql = "SELECT password FROM signin WHERE username = '$user'";
    // $result = User::login( $user,$pass);

    // $result = $conn->query($sql); 
    // print_r($result);
    // if($result){
    //    print_r($result);
    //     print_r($row);
    //     print_r($result);
        
    // } else {
    //     echo "Query Failed";
    // }
    // $user = 'pragathis';
    // $pass = 'password';
    // $result = null;

    // if(Session::get('session_token')){
    //     $userdata = Session::get('user_session');
    //     echo "Welcome back $userdata[username]";
    //     $result = $userdata;
    // } else {
    //     // Session::set('session_token',true);
    //     $userSession = new UserSession(1);
    //     $result = $userSession->authentication($user,$pass);
    //     echo "No Session found!!! try to Login Now";
    //     if($result){
    //         Session::set('session_token',$result);
    //         echo "Login Success";
    //     } else {
    //         echo "Login Failed";
    //     }
    // }

    // $user = new User('ramya');
    // if($user){
    //     print $user;
    // } else {
    //     echo "user not found";
    // }
    // $result = $user->_get_data('bio');
    // if($result){
    //     print_r($result);
    // } else {
    //     echo "User Not Found";
    // }

    // $result1 = $user->_set_data('bio',"I\'m a Lawyer");
    // if($result1){
    //     print_r($result1);
    //     echo "success";
    // } else {
    //     echo "User Not Found";
    // }
//     
//     $var = 'bio';
//     $value = "I\'m a Judge";
//     $id = '30';

//     $sql = "UPDATE user SET $var='$value' WHERE id = '$id';";
//     // $result = ;

//     if($conn->query($sql)){
//         echo 'true';
//     } else {
//         echo "User Not Found";
//     }

// $method = 'getAvatar';
// $property = preg_replace("/[^0-9a-zA-Z]/","",substr($method,3));
// $property = strtolower(preg_replace('/\B([A-Z])/','_$1',$property));
// echo $property;

// $result = $user->setBio('designer');

// if($result){
//     print_r($user->getBio());
// } else {
//     echo 'failed';
// }
// print_r($_SERVER);


// $userSession = new UserSession(1);
// $result = $userSession->authentication('pragathis','password');
// print_r($result);
// print_r($userSession);
// // $userdata = Session::get('user_session');
// // if($userdata){
// //     echo $userdata;
// // } else {
// //     echo 'not set yet!!!';
// // }

// echo "User Session :" . Session::get('session_token');
//  $user = new User(1);
//  if($user){
//     print_r($user);
//  }else {
//     echo "user id or name invalid";
//  }

// $user = new UserSession(1);
// $username = $user->authentication('pragathis','password');
// if($username){
//    print_r($username);
// }else {
//    echo "user id or name invalid";
// }

// $user = 'pragathis';
// $pass = 'password';
// $result = null;
// $token = null;

// if(Session::get('session_token')){
//     $username = Session::get('user_session');
//     echo "Welcome back $username[username]";
// } else {
//     $userSession = new UserSession('token123');
//     echo "Session destroyed please login again ";
//     if($userSession->uid){
//         echo 'hello';
//         $token = $userSession;
//         Session::set('session_token',$token);
//     } else{
//         $result = $userSession->authentication($user,$pass);
//         print_r($result);
//     }
// }

// $userSession = new UserSession($token);
// // print_r($userSession->uid);
// echo "Session destroyed please login again ";
// if($userSession->uid){
//     echo 'hello';
//     $token = $userSession;
//     Session::set('session_token',$token);
// } else{
//     // echo 'hello world';
//     $result = $userSession->authentication($user,$pass);
//     print_r($result);
// }

// $token = null;
$userSession = new UserSession();
$SessionToken = Session::get('session_token');
if($SessionToken){
    $username = Session::get('user_session');
    print "Welcome back $username";
    $authUser = $userSession->authorization($SessionToken);
    if(!$authUser){
        echo "Session invalid";
        Session::unset();
    }
    // $userSession->getRemainingTime();
} else {
    echo "Login failed try to login again ";
    $usertoken = $userSession->authentication('pragathis','password');
    // print($usertoken);
    if($usertoken){
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

// echo $_SERVER['REMOTE_ADDR'];   

// EDGE : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0

//CHROME : Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36

//FIREFOX : Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:120.0) Gecko/20100101 Firefox/120.0
?>
</pre>

