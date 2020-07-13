<?php require_once('header.php');?>
<?php require_once('nav.php');

$userlist=new User();

$userlist=$userMrg->getAllUser();
//
?>


<?php if( isset($_SESSION['login_flag']) && $_SESSION['login_flag']){ ?>
    <div id="content">

        <!--  Sout out-->

        <div id="comment_form">
            <h3>Other users information</h3>
            <?php foreach ($userlist as $item):
        $singleUser=new User($item);?>

               <p style="font-size: 18px">
            <div class="user_card">
                <div class="userImg">
                    <img src="<?=$singleUser->getAvatar()?>" style="width: 140px; height: 140px">
                </div>
                <div class="userDetails">
                    <p>Username : <?=$singleUser->getUsername()?></p>
                    <p>Firstname : <?=$singleUser->getFname() ?></p>
                    <p>Lastname : <?=$singleUser->getLname() ?></p>
                    <p>Age : <?=$singleUser->getAge() ?></p>
                    <p>Gender : <?=$singleUser->getGender() ?></p>
                </div>
            </div>

            <?php
                endforeach; ?>

        </div>

        <div class="cleaner"></div>
    </div> <!-- end of content -->
<?php }
    else{ ?>

    <h1>Please login</h1>
    <img src="images/please_login.jpg" class="loginfail" />

<?php  } ?>
<?php require_once('footer.php');?>