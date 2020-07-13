<?php

//echo $_SESSION['user']['id'];
if(! isset($_SESSION['userlist'])){
    $_SESSION['userlist']=array(
        array(
            "id"=>"",
            "fname"=>"a",
            "lname"=>"a",
            "age"=>"",
            "gender"=>"",
            "username"=>"a",
            "password"=>"a",
            "avtar"=>"images/smile2.png",
            "count"=>0
        )
    );
}

if(isset($_SESSION['login_flag'])) {
    if ($_SESSION['login_flag']) {
        $a = $_SESSION['postlist'];
//    print_r($_SESSION['postlist']);

        $last_postlist = $_SESSION['postlist'];
        $_SESSION['post'] = $_SESSION['post'] = $post = array(
            array(
                "postid" => 0,
                "userid" => 0,
                "title" => 'aSa',
                "desc" => 'aSas',
                "date" => date("Y/m/d"),

            )
        );
//print_r($_SESSION['postlist']);

        $c=0;
        for ($i = 0; $i < count($_SESSION['postlist']); $i++) {
            if ($a[$i]['userid'] == $_SESSION['user']['id']) {
                array_push($_SESSION['post'], $a[$i]);
                $c++;
            }
        }
        $_SESSION['user']['count']=$c;
//        echo $_SESSION['user']['id'];
    }
}
if(empty($_SESSION['postlist'])) {

    $post = array(
        array(
                "postid"=>0,
                "userid"=>0,
            "title" => 'aSa',
            "desc" => 'aSas',
            "date" => date("Y/m/d"),

        )
    );
    $_SESSION['postlist'] = $post;
    $_SESSION['post'] = $post;
}
//print_r($_SESSION['post']);
//echo "<br>";
//print_r($_SESSION['postlist']);
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Power Blog</title>
    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/myStyle.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="wrapper">
    <div id="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="blog_post.php" class="current">Post</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="user.php">User</a></li>
        </ul>
    </div> <!-- end of menu -->

    <div id="header">
        <div id="site_title">
            <a href="#" target="_blank"><span class="logo">POWER <br/> BLOG</span></a>
        </div> <!-- end of site_title -->

        <div id="header_right">
            <h1>Lorem ipsum dolor sit amet</h1>
            <p>Etiam sit amet turpis. Duis nulla diam, posuere ac, varius id, ullamcorper sit amet, libero. Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus.</p>
            <div class="btn_more image_fr"><a href="blog_post.php">Read more</a></div>
        </div>

        <div class="cleaner"></div>
    </div> <!-- end of header -->
