<?php require_once('header.php'); ?>
<?php require_once('nav.php');?>
<?php

$postMrg=new PostManager();

$post=$postMrg->getAllPost();



?>
        <div id="content">

            <?php
               foreach ($post as $post):
                         $p=new Post($post);

//                   $singleUser=new User($userMrg->singleuser( $msg['m_sender']));
                   $u=new User($userMrg->getUser($p->getId()));


                    ?>
                    <div class="post_box">
                        <h2><a href="#" target="_parent">  <?=$p->getTitle() ?></a></h2>
                        <div class="post_meta"><strong>Date:<?=$p->getDate() ?></strong> <?php ?> <strong>Author:<?=$u->getFname() ?>  <?=$u->getLname() ?> </strong><?php ?> <?php ?></div>
                        <a href="#"><img src="<?=$u->getAvatar(); ?>" alt="image 2" style="height: 100px; width: 100px" /></a>
                        <p><?=$p->getDesc(); ?></p>
                        <div class="cleaner_h20"></div>
                        <div class="cleaner"></div>
                    </div>
                <?php endforeach; ?>



        </div>
        
       <?php require_once ('footer.php');?>
