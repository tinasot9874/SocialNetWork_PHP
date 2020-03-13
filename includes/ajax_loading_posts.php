<?php
    include ("../includes/config.php");
    include ("../includes/classes/User.php");
    include ("../includes/classes/Post.php");


    $limit = 5; //Number of posts to be loaded per call

    $posts = new Post($conn, $_REQUEST['userLoggedIn']);
    $posts->loadPostsFriends($_REQUEST, $limit);
?>