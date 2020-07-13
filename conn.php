<?php
//session_start();
date_default_timezone_set("America/Montreal");
//default login
$_SESSION['login_flag']=false;

//User registration array
if(empty($_SESSION['userlist'])) {
    $user = array();

    $user = array(
        array(
            "id" => 0,
            "fname" => "keyur",
            "lname" => "Patel",
            "age" => 23,
            "gender" => "male",
            "username" => "i.m.keyur",
            "password" => "123",
            "avtar" => "ass",
            "count" => 0
        ),
    );

    $_SESSION['userlist']=$user;
}
?>