<?php

// Declaring variable to prevent errors
$fname           = "";          // First name
$lname           = "";          // Last name
$email           = "";          // Email
$password        = "";          // Password
$password_cfm    = "";          // Confirm Password
$date            = "";          // Sign up date
$dob             = "";          // Day of birds
$sex             = "";          // Sex
$city            = "";          // City
$country         = "";          // Country
$picture_user    = "";          // Picture User
$error_array     = array();     // Holds error messages

//Registration form value

if (isset($_POST['register'])){


    // Username


    //First name
    $fname = strip_tags($_POST['firstname']);                //Remove html tags
    $fname = str_replace(" ", "", $fname);      //Remove blank spaces
    $fname = ucfirst(strtolower($fname));                   //Uppercase first name
    $_SESSION['fname'] = $fname; // Stores first name into session variable
    if (strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array,"Your First name must be between 2 and 25 characters");
    }


    //Last name
    $lname = strip_tags($_POST['lastname']);                 //Remove html tags
    $lname = str_replace(" ", "", $lname);      //Remove blank spaces
    $lname = ucfirst(strtolower($lname));                   //Uppercase first name
    $_SESSION['lname'] = $lname;                            // Stores last name into session variable
    if (strlen($lname) > 25 || strlen($lname) < 2){
        array_push($error_array,"Your Last name must be between 2 and 25 characters") ;
    }

    //Email
    $email = strip_tags($_POST['email']);                   //Remove html tags
    $email = str_replace(" ","", $email);     //Remove blank spaces
    $email = ucfirst(strtolower($email));                   //Uppercase first name
    $_SESSION['email'] = $email;                            // Stores email into session variable
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){    // FILTER_VALIDATE_EMAIL :Check if the variable $email
                                                            // is a valid email address
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        // Check if email already exists
        $email_check = mysqli_query($conn, "SELECT email FROM users WHERE email ='$email'");

        //Count the number of rows returned
        $num_rows = mysqli_num_rows($email_check);

        if ($num_rows > 0){
            array_push($error_array,"Email already in use") ;
        }

    }else{
        array_push($error_array,"Invalid Email! Please check again");
    }

    //Date
    $date = date("Y-m-d"); // Get current date
    $_SESSION['date'] = $date;                 // Stores date into session variable

    //Password
    $password = strip_tags($_POST['password']);                //Remove html tags password1
    $password_cfm = strip_tags($_POST['cfm_password']);        //Remove html tags password2
    if ($password != $password_cfm){
        array_push($error_array,"Password don't match!");
    }else{
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($error_array,"Your password can only contain characters and numbers");
        }
    }
    if (strlen($password) > 30 || strlen($password) <5){

        array_push($error_array,"Your password must be between 5 and 30 characters");
    }

    // City
    $city  = strip_tags($_POST['city']);
    $_SESSION['city'] = $city;

    //Country
    $country = $_POST['country'];
    // Sex
    $sex   = $_POST['sex'];
    $_SESSION['sex'] = $sex;

    //Birthday
    $dob = $_POST['birthday'];
    $_SESSION['birthday'] = $dob;


    // Set default_avatar for new user
    $picture_user = "images/users/default_avatar.jpg";


    // Encrypt password
    if (empty($error_array)){

        $password = md5($password);     //Encrypt password before sending to database

        //Generate username by fname + lname
        $username = strtolower($fname . "_" . $lname);   //Make a string lowercase for fname_lname
        $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
        $i = 0;
        // if username exits add number to username
        while(mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'"); // Check username again
        }

        // Insert data to database

        $query = mysqli_query($conn, "INSERT INTO users VALUES ('','$username', '$fname', '$lname', '$email', '$password', '$dob', '$date', '$sex', '$city', '$country', '$picture_user', '0' , '0', 'no', ',')");

        // Clear session variable after register success
        $_SESSION['fname'] = "";
        $_SESSION['lname'] = "";
        $_SESSION['email'] = "";
        $_SESSION['city'] = "";
        // Notify register sucessfully
        array_push($error_array,"<span style='color: #4cae4c;'>You're all set! Go ahead and login!</span>");
    }
}