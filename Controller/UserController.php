<?php
include "../head.inc.php";
$userMgr = new UserManager();
$postMgr = new PostManager();
$action     = $_REQUEST['submit'];

function getFileName()
{

        $FileName = $_FILES['avatar']['name'];
        $FileSize = $_FILES['avatar']['size'] / 1024 / 1024;
        $FileType = explode("/", $_FILES['avatar']['type']);
        $FileLocation = $_FILES['avatar']['tmp_name'];
        $path = "images/" . $FileName;

        if ($_FILES['avatar']['error'] == 0) {
            if ($FileType[0] != "image") {
                array_push($error, "Please upload image only!");
            } elseif ($FileSize > 5) {
                array_push($error, "Your image is very big!");
            } else {
                move_uploaded_file($FileLocation, '../'.$path);
                return $path;
            }
        }

}

switch ( $action ) {
    case "Register":
        $_SESSION['login_flag'] = false;
            $user=new User($_POST,getFileName());
            if($userMgr->registration($user))
            {
                header("location:../index.php");
            } else {
                $_SESSION['msg'] = "Database Error!";
            }
        break;

    case "Login":

                $u=$userMgr->login($_POST['username']);
            //    var_dump($u);
                    if(empty($u)){
                        $_SESSION['error'] = "Wrong password/Username...Please Try Again.";
                        header("location:../index.php");
                    }else {
                        $user = new User($u);
//                        var_dump($user);
                        if ($_POST['password'] == '') {
                            $_SESSION['error'] = "Password is required";
                        } else {
                            if ($_POST['password'] == $user->getPassword()) {
                                $_SESSION['userinfo'] = serialize($user);
                                $_SESSION['login_flag'] = true;
                                $_SESSION['error']="";

                                header("location:../index.php");
                            } else {
                                $_SESSION['error'] = "Wrong password/Username...Please Try Again.";

                                header("location:../index.php");
                            }

                        }
                    }
        break;

    case "Logout":
        unset($_SESSION['userinfo']);
        unset($_SESSION['login_flag']);
        unset($_SESSION['count']);
        unset($_SESSION['user']);
    header("location:../index.php");
        break;

    case "Edit Confirm":
        if (!empty($_FILES['avatar']['name'])) {
            $user = new User($_POST, getFileName());
        }
        else{
          //  var_dump($_POST);
            $user = new User($_POST);
        }
    //var_dump($user);
        if($userMgr->editProfile($user))
        {

            $_SESSION['userinfo']=  serialize($user);
//            var_dump(unserialize($_SESSION['userinfo']));
            header("location:../profile.php");
        } else {
            $_SESSION['msg'] = "Database Error!";
        }
        break;

    case "Change Password":
        $user=new user();
        $user=unserialize($_SESSION['userinfo']);
//        var_dump($user);
        if($_POST['old_psw']==$user->getPassword())
        {
            if ($_POST['confirm_psw'] == $_POST['new_psw']) {
                $user->setPassword($_POST['confirm_psw']);
                $_SESSION['userinfo']=serialize($user);
//                var_dump($user);
                $userMgr->changePsw($user);
                header("location:../profile.php");
            }
            else{
                $_SESSION['not_match']="New password and Confirm password not match";
//                echo "New password and Confirm password not match";
                header("location:../profile.php");
            }
        }
        else{
            $_SESSION['old_psw_error']="Old password is wrong";
//            echo "Old password is wrong";
            header("location:../profile.php");
        }
        break;

    case "Post":
        echo "post";
        $user = new User();
        $user=unserialize($_SESSION['userinfo']);

        $post = new Post($_POST,$user->getId());
      //  var_dump($post);

        if($postMgr->addPost($post)){
           // $_SESSION['count']=$_SESSION['count']+1;
           header("location:../blog_post.php");
        }



        break;
}