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
        $data = mysqli_query($this->conn, "SELECT * FROM posts WHERE delete='no' ORDER BY id DESC");
        while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_added'];

            // Prepare user_to string so it can be include even if not posted to a user
            if ($row['user_to'] == "none"){
                $user_to = "";
            }else{
                $user_to_obj = new User($conn, $row['user_to']);
                $user_to_name = $user_to_obj->getFirstAndLastName();
                $user_to = "<a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
            }
            // Check if user who posted, has their account closed
            $added_by_obj = new User($conn, $added_by);
            if ($added_by_obj->isClosed()){
                continue;
            }
            $user_details_query = mysqli_query($this->conn, "SELECT first_name, last_name, profile_pic FROM users WHERE username = '$added_by'");
            $user_row = mysqli_fetch_array($user_details_query);

        }
    }
}