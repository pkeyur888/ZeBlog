<?php

include "head.inc.php";
$user=new User();
$userMrg=new UserManager();


if(!isset($_SESSION['userinfo'])){
    $_SESSION['userinfo']="";
}

$user=unserialize($_SESSION['userinfo']);


if(! isset($_SESSION['error'])){
    $_SESSION['error']="";
}


if(isset($_POST['registration'])){
    header('location:register.php');
}


?>
<div id="content_wrapper_top"></div>
<div id="content_wrapper">
<?php if( (isset($_SESSION['login_flag']) &&  (! $_SESSION['login_flag']) )|| (! isset($_SESSION['login_flag'])  ) ) :?>
    <div id="sidebar">
        <div id="login">
            <h3 class="hr_divider">Member Login</h3>
            <form method="post" action="Controller/UserController.php">
                <label for="username">Username:</label> <input name="username" type="text" class="login_field" id="username" maxlength="30" required/>
                <div class="cleaner_h10"></div>
                <label for="email">Password:</label> <input name="password" type="password" class="login_field" id="email" maxlength="30" required />
                <div class="cleaner_h10"></div>
                <input type="submit" name="submit" id="submit" value="Login" class="submit_btn" />
            </form>
            <form method="post" action="">
                <input type="submit" name="registration" id="submit" value="Register" class="submit_btn" />
            </form>
        </div>

        <span class="error_nav" style="color: red"><?=$_SESSION['error']; ?></span>
    </div>
<?php endif; ?>

<?php if( isset($_SESSION['login_flag']) && $_SESSION['login_flag'] ) :?>
    <div id="sidebar">

                <p>Welcome <?=$user->getFname();?>  <?=$user->getLname();?> </p><br>
                <img src="<?=$user->getAvatar() ?>" id="login_img">



                <form  method="post" action="Controller/UserController.php">
                    <input type="submit" name="submit" value="Logout">
                </form>


            </div>
  <?php endif; ?>
