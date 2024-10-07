<?php
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';

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

