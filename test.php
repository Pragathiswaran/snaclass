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
    if($conn){
        print_r($conn);
    } else {
        echo "Connection Failed";
    }
?>
</pre>
