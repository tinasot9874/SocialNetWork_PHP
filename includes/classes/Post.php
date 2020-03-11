<?php


class Post{

    private $user_obj;
    private $conn;

    public function __construct($conn, $user)
    {
        $this->conn = $conn;
        $this->user_obj = new User($conn, $user);
    }
    public function submitpost($body, $user_to){
        $body = strip_tags($body);  // Remove HTML tags
        $body = mysqli_real_escape_string($this->conn, $body);
        $check_empty = preg_replace('/\s+/','',$body); //Delete all space
        if ($check_empty !=""){

            //Current date and time
            $date_added = date("Y-m-d H:i:s");

            //Get username
            $added_by = $this->user_obj->getUsername();

            //If user is on own profile, user_to is 'none'
            if ($user_to == $added_by){
                $user_to = "none";
            }
            //Insert post to database
            $query = mysqli_query($this->conn, "INSERT INTO posts VALUES('','$body', '$added_by', '$user_to', '$date_added', 'no', 'no' , '0')");
            $returned_id = mysqli_insert_id($this->conn);

            //Insert notification

            //Update post count for user
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->conn, "UPDATE users SET num_posts='$num_posts' WHERE username ='$added_by'");
        }
    }

    public function loadPostsFriends() {
        $str = "";      // String to return
        $data = mysqli_query($this->conn, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");
        // Show errors when query is fails
//                if (!$data) {
//                    printf("Error: %s\n", mysqli_error($this->conn));
//                    exit();
//                }
        while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_added'];

            // Prepare user_to string so it can be include even if not posted to a user
            if ($row['user_to'] == "none"){
                $user_to = "";
            }else{
                $user_to_obj = new User($this->conn, $row['user_to']);
                $user_to_name = $user_to_obj->getFirstAndLastName();
                $user_to = "to <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
            }
            // Check if user who posted, has their account closed
            $added_by_obj = new User($this->conn, $added_by);
            if ($added_by_obj->isClosed()){
                continue;
            }

            $user_details_query = mysqli_query($this->conn, "SELECT firstname, lastname, profile_pic FROM users WHERE username='$added_by'");
            $user_row = mysqli_fetch_array($user_details_query);
            $first_name = $user_row['firstname'];
            $last_name = $user_row['lastname'];
            $profile_pic = $user_row['profile_pic'];

            // Timeframe

            $date_time_now = date("d-m-Y H:i:s");
            $start_date = new DateTime($date_time);     // Time of post
            $end_date = new DateTime($date_time_now);   // Current Time
            $interval = $start_date->diff($end_date);   // Difference between dates
            if ($interval->y >= 1) {
                if ($interval == 1) {
                    $time_message = $interval->y . " year ago"; // 1 year ago
                } else {
                    $time_message = $interval->y . " year ago"; // 1+ year ago
                }
            }
            else if ($interval->m >= 1) {
                if ($interval->d == 0) {
                    $days = " ago";
                } else if ($interval->d == 1) {
                    $days = $interval->d . " day ago";
                } else {
                    $days = $interval->d . " days ago";
                }
                if ($interval->m == 1) {
                    $time_message = $interval->m . " month " . $days;
                } else {
                    $time_message = $interval->m . " months " . $days;
                }
            }
            else if ($interval->d >= 1) {
                if ($interval->d == 1) {
                    $time_message = " Yesterday";
                } else {
                    $time_message = $interval->d . " days ago";
                }
            }
            else if ($interval->h >= 1) {
                if ($interval->h == 1) {
                    $time_message = $interval->h . " hour ago";
                } else {
                    $time_message = $interval->h . " hours ago";
                }
            }
            else if ($interval->i >= 1) {
                if ($interval->i == 1) {
                    $time_message = $interval->i . " minute ago";
                }
                else {
                    $time_message = $interval->i . " minutes ago";
                }
            } else {
                if ($interval->s < 30) {
                    $time_message = " Just now";
                } else {
                    $time_message = $interval->s . " seconds ago";
                }
            }

            // Posting content

            $str .= "<div class='post-content'>
                         <div class='post-container'>
                            <img src='$profile_pic' alt='user' class='profile-photo-md pull-left'/>
                            <div class='post-detail'>
                                <div class='user-info'>
                                    <h5>
                                        <a href='$added_by' class='profile-link'>$first_name $last_name $user_to </a> 
                                        <p class='text-muted'>Published  about $time_message</p></span>
                                    </h5>
                                    
                                </div>
                                <div class='reaction'>
                                    <a class='btn text-green'><i class='icon ion-thumbsup'></i> 13</a>
                                    <a class='btn text-red'><i class='fa fa-thumbs-down'></i> 0</a>
                                </div>
                                <div class='line-divider'></div>
                                <div class='post-text'>
                                    <p>
                                            $body
                                    
                                    <i class='em em-anguished'></i> 
                                    <i class='em em-anguished'></i>
                                    <i class='em em-anguished'></i>
                                    </p>
                                </div>
                                <div class='line-divider'></div>
                                <div class='post-comment'>
                                    <img src='images/users/user-11.jpg' alt='' class='profile-photo-sm'/>
                                    <p><a href='profile.php' class='profile-link'>Diana </a><i class='em em-laughing'></i>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    </p>
                                </div>
                                <div class='post-comment'>
                                    <img src='images/users/user-4.jpg' alt='' class='profile-photo-sm'/>
                                    <p><a href='profile.php' class='profile-link'>John</a> Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                </div>
                                <div class='post-comment'>
                                    <img src='images/users/user-1.jpg' alt='' class='profile-photo-sm'/>
                                    <input type='text' class='form-control' placeholder='Post a comment'>
                                </div>
                            </div>
                        </div>
                     </div>";

        }
        echo $str;
    }
}

