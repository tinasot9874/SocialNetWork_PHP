<?php
    require_once 'includes/config.php';
    if (isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($conn, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }else{
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>News Feed | Check what your friends are doing</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>

    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>

<!-- Header ================================================= -->
<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-register.html"><img src="images/logo.png" alt="logo" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="images/down-arrow.png" alt="" /></span></a>
                        <ul class="dropdown-menu newsfeed-home">
                            <li><a href="index-2.html">Landing Page 1</a></li>
                            <li><a href="index-register.html">Landing Page 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="images/down-arrow.png" alt="" /></span></a>
                        <ul class="dropdown-menu newsfeed-home">
                            <li><a href="newsfeed.php">Newsfeed</a></li>
                            <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                            <li><a href="newsfeed-friends.html">My friends</a></li>
                            <li><a href="newsfeed-messages.html">Chatroom</a></li>
                            <li><a href="newsfeed-images.html">Images</a></li>
                            <li><a href="newsfeed-videos.html">Videos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Timeline <span><img src="images/down-arrow.png" alt="" /></span></a>
                        <ul class="dropdown-menu login">
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="timeline-about.html">Timeline About</a></li>
                            <li><a href="timeline-album.html">Timeline Album</a></li>
                            <li><a href="timeline-friends.html">Timeline Friends</a></li>
                            <li><a href="edit-profile-basic.html">Edit: Basic Info</a></li>
                            <li><a href="edit-profile-work-edu.html">Edit: Work</a></li>
                            <li><a href="edit-profile-interests.html">Edit: Interests</a></li>
                            <li><a href="edit-profile-settings.html">Account Settings</a></li>
                            <li><a href="edit-profile-password.html">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Pages <span><img src="images/down-arrow.png" alt="" /></span></a>
                        <ul class="dropdown-menu page-list">
                            <li><a href="logout.php">Landing Page 1</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="contact.html">Contact</a></li>
                </ul>
                <form class="navbar-form navbar-right hidden-sm">
                    <div class="form-group">
                        <i class="icon ion-android-search"></i>
                        <input type="text" class="form-control" placeholder="Search friends, photos, videos">
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!--Header End-->

