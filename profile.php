<?php require_once('header.php');?>
<?php require_once('nav.php');?>



<?php if( isset($_SESSION['login_flag']) && $_SESSION['login_flag']): ?>
            <div id="content">


<!-- Edit profile information-->

                <div id="comment_form">

                    <h3>Edit profile information</h3>

                    <form method="post" name="contact" action="Controller/UserController.php" enctype="multipart/form-data">

                        <div class="form_row">
                            <span class="error">
                                        <?if(isset($_SESSION['old_psw_error'])){ echo $_SESSION['old_psw_error'];} ?></span>
                            <span class="error"><?if(isset($_SESSION['not_match'])){ echo $_SESSION['not_match'];} ?></span>
                            <label for="fname">Firstname</label><br>
                            <input type="text" class="input_field" name="fname" id="fname" value="<?=$user->getFname()?>" required><br>

                        </div>

                        <div class="form_row">
                            <label for="lname">Lastname</label><br>
                            <input type="text" class="input_field" name="lname" value="<?=$user->getLname() ?>" id="lname" required><br>

                        </div>


                        <div class="form_row">
                            <label for="age">Age</label><br>
                            <input type="text" class="input_field" name="age"  value="<?=$user->getAge() ?>" id="age" required><br>

                        </div>

                        <div class="form_row">
                            <label for="gender">Gender : </label>
                            <label><input type="radio" name="gender" value="Male" <?php echo ($user->getGender()=='Male')? 'checked':'';  ?>>Male</label>
                            <label><input type="radio" name="gender" value="Female" <?php echo ($user->getGender()=='Female')? 'checked':'';  ?> >Female</label><br>
                        </div>

                        <div class="form_row">
                            <label for="username">Username</label><br>
                            <input type="text" class="input_field" name="username"  value="<?=$user->getUsername() ?>"  id="username" readonly><br>
                            <input type="hidden" class="input_field" name="pswd"  value="<?=$user->getPassword() ?>"  id="password" >
                        </div>

                        <div class="form_row">
                            <label for="avatar">Avatar</label><br>
                            <img id="login_img" src="<?=$user->getAvatar() ?>"><br>
                            <input type="hidden" class="input_field" name="avatar"  value="<?=$user->getAvatar() ?>"  >
                            <input type="hidden" class="input_field" name="id"  value="<?=$user->getId() ?>"  >
                            <input type="hidden" class="input_field" name="password"  value="<?=$user->getPassword() ?>"  >
                            <input type="file" class="input_field" name="avatar" id="avatar">
                        </div>

                        <div>

                            <input type="submit" class="submit_btn" name="submit" value="Edit Confirm">
                            <input type="button" class="submit_btn" name="change_password" value="Change Password" onclick="openChangePassword()">
                        </div>

                    </form>

                        <div id="chg_psw" style="display: none">
                            <form method="post" action="Controller/UserController.php" name="change_psw">
                                <div class="form_row">
                                    <label for="password">Old Password</label><br>
                                    <input type="password" class="input_field" name="old_psw"  id="age" required><br>

                                </div>

                        <div class="form_row">
                            <label for="password">New Password</label><br>
                            <input type="password" class="input_field" name="new_psw"   id="age" required><br>

                        </div>
                        <div class="form_row">
                            <label for="confirm_psw">Confirm Password</label><br>
                            <input type="password" class="input_field" name="confirm_psw"   id="age" required><br>

                        </div>
                                <input type="submit" class="submit_btn" name="submit" value="Change Password">
                        </div>


                </div>

                <div class="cleaner"></div>

                </div>
<?php else: ?>

    <h1>Please login</h1>
    <img src="images/please_login.jpg" class="loginfail" />

<?php  endif; ?>

<?php require_once('footer.php');?>
