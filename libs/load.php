<?php
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';
include_once 'includes/UserSession.class.php';

Session::start();

global $__site_config_;

$__site_config_ = "$_SERVER[DOCUMENT_ROOT]/../photogram.json";

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

function set_config($key) {
    global $__site_config_;
    if (file_exists($__site_config_)) {
        $DB_Value = file_get_contents($__site_config_);
        if($DB_Value){
            $DB_Config = json_decode($DB_Value);
            if(json_last_error()){
                echo "Error in parsing JSON file.<br>";
                return false;
            }
            if (isset($DB_Config->{$key})) {
                return $DB_Config->{$key};
            } else {
                echo "Key $key does not exist in the configuration file.<br>";
                return false;
            } 
        } else {
            echo "Can't able to get the file content";
            return false;
        }
      
    } else {
        echo "File $__site_config_ does not exist.<br>";
        return false;
    }
}
