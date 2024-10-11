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
    if($conn){
        print_r($conn);
    } else {
        echo "Connection Failed";
    }
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
    // $user = 'ramya';
    // $pass = 'password';
    // $result = null;

    // if(Session::get('is_loggedin') == true){
    //     $userdata = Session::get('user_session');
    //     echo "Welcome back $userdata[username]";
    //     $result = $userdata;
    // } else {
    //     Session::set('is_loggedin',true);
    //     $result = User::login($user,$pass);
    //     echo "No Session found!!! try to Login Now";
    //     if($result){
    //         Session::set('user_session',$result);
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

?>
</pre>

