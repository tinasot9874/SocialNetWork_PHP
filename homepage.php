<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");
if (isset($_POST['publish_post'])){
    $post = new Post($conn, $userLoggedIn);
    $post->submitpost($_POST['post_texts'], 'none');
}
?>
<div id="page-contents">
    <div class="container-fluid">
        <div class="row">

            <!-- Newsfeed Common Side Bar Left
            ================================================= -->
            <?php include("includes/newsfeed_sidebar_left.php"); ?>

            <!-- Newsfeed Common Center
            ================================================= -->
            <div class="col-md-7">

                <!-- ========================Post Create Box========================= -->

                <form action="homepage.php" method="post">
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <img src="<?php echo $user['profile_pic']; ?>" alt="" class="profile-photo-md"/>
                                    <textarea name="post_texts" id="exampleTextarea" cols="50" rows="1" class="form-control"
                                              placeholder="Write what you wish"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <ul class="publishing-tools list-inline">
                                        <li><a href="#"><i class="ion-compose"></i></a></li>
                                        <li><a href="#"><i class="ion-images"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                        <li><a href="#"><i class="ion-map"></i></a></li>
                                    </ul>
                                    <button name="publish_post" class="btn btn-primary pull-right">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Post Create Box End-->

                <!-- Post Content ================================================= -->
                <div class='post-content'> </div>

                <!-- Loading post ================================================= -->
                <img id="loading" src="images/icon/loading.gif" >





            </div>

            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <?php include("includes/newsfeed_sidebar_right.php");  ?>
        </div>
    </div>
</div>


<!--preloader-->
<div id="spinner-wrapper">
    <div class="spinner"></div>
</div>

<!-- Scripts
================================================= -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/jquery.scrollbar.min.js"></script>
<script src="js/script.js"></script>
<script>
    var userLoggedIn = '<?php echo $userLoggedIn; ?>';
    $(document).ready(function () {
        $('#loading').show();

        // Original ajax request for loading first posts
        $.ajax({
            url: "includes/ajax_loading_posts.php",
            type: "POST",
            data: "page=1&userLoggedIn=" + userLoggedIn,
            cache:false,

            success: function (data) {
                $('#loading').hide();   // hide icon loading.gif when loading success
                $('.post-content').html(data);
            }
        });


        $(window).scroll(function () {
            var height = $('.post-content').height();  // Div containing posts
            var scroll_top = $(this).scrollTop();
            var page = $('.post-content').find('.nextPage').val();
            var noMorePosts = $('.post-content').find('.noMorePosts').val();

            if (($(window).scrollTop() + $(window).height() > $(document).height() - 100) && noMorePosts == 'false') {
                $('#loading').show();

                var ajaxReq = $.ajax({
                                        url: "includes/ajax_loading_posts.php",
                                        type: "POST",
                                        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                                        cache:false,

                                        success: function(response) {
                                            $('.post-content').find('.nextPage').remove(); //Removes current .nextpage
                                            $('.post-content').find('.noMorePosts').remove(); //Removes current .nextpage

                                            $('#loading').hide();
                                            $('.post-content').append(response);
                                        }
                                     });
            } // end if
            else {
                return false;
            }
        });  // end   $(window).scroll(function ())
    });
</script>
</body>

</html>
