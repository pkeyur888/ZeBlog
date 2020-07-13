<?php require_once('header.php');?>
<?php require_once('nav.php');?>
<?php



//var_dump($post);

?>

        <?php if( isset($_SESSION['login_flag']) && $_SESSION['login_flag'] ):
    $postMrg=new PostManager();

    $post=$postMrg->getUserPost($user->getId());?>
            <div id="content">

                <!--  Sout out-->

                <div id="comment_form">

                    <h3>Add Post</h3>

                    <form action="Controller/UserController.php" method="post">

                        <div class="form_row">
                            <label>Title</label>
                            <br />
                            <input name="title" type="text" class="input_field" maxlength="40" required />
                        </div>

                        <div class="form_row">
                            <label>Description</label><br />
                            <textarea  name="description" rows="" cols="" class="input_field" required></textarea>
                        </div>

                        <input type="submit" name="submit" value="Post" class="submit_btn" />
                    </form>

                </div>


                <?php


                    foreach ($post as $post):
                        $p=new Post($post);
                        ?>
                        <div class="post_box">

                            <h2><a href="#" target="_parent">  <?=$p->getTitle() ?></a></h2>

                            <div class="post_meta"><strong>Date:</strong> <?=$p->getDate()?> <strong>Author: </strong><?=$user->getFname() ?>  <?=$user->getLname() ?></div>
                            <a href="#"><img src="<?=$user->getAvatar() ?>" alt="image 2" style="height: 100px; width: 100px" /></a>
                            <p><?=$p->getDesc() ?></p>
                            <div class="cleaner_h20"></div>
                            <div class="cleaner"></div>

                        </div>
                    <?php endforeach; ?>



    <div class="cleaner"></div>
</div> <!-- end of content -->
        <?php else: ?>

        <h1>Please login</h1>
            <img src="images/please_login.jpg" class="loginfail" />

<?php  endif; ?>
<?php require_once('footer.php');?>