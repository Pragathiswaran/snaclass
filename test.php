<pre>
<? 

include 'libs/load.php';
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
    //     echo "Connection Failed";
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
    $user = 'praga';
    $pass = 'password';
    $result = null;

    if(Session::get('is_loggedin') == true){
        $userdata = Session::get('user_session');
        echo "Welcome back $userdata[username]";
        $result = $userdata;
    } else {
        Session::set('is_loggedin',true);
        $result = User::login($user,$pass);
        echo "No Session found!!! try to Login Now";
        if($result){
            Session::set('user_session',$result);
            echo "Login Success";
        } else {
            echo "Login Failed";
        }
    }
?>
</pre>
