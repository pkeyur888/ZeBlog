<?php
//require_once ('conn.php');
session_start();
//print_r($_SESSION['userlist']);
function searchForId($name, $array) {
    foreach ($array as $key => $val) {
        if ($val['username'] == $name) {
            return $val;
        }
    }
    return null;
}
if(isset($_POST['registration'])){
    header('location:register.php');
}

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id=array();
    $id=searchForId($username,$_SESSION['userlist']);


    if($id['username']==$username && $id['password']==$password){
        echo "login";
    }
    else{
        echo "in elae";
    }


echo "  <br> ";
//    print_r($id);


}

?>