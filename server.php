<?php 

session_start();

//initialising variable
$first_name = "";
$last_name = "";
$email = "";

$errors = array();

//connect to db

$db = mysqli_connect('localhost','root','root','loginuser') or die("could not connect to database");

//Registering user
if (isset($_POST['reg_user'])) { 
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //form validation
    //Requred field

    if(empty($first_name)) {array_push($errors, "First name is required");
    }
    if(empty($last_name)) {array_push($errors, "Last name is required");
    }
    if(empty($password_1)) {array_push($errors, "Password is required");
    }

    //password match
    if($password_1 != $password_2) {array_push($errors, "Password do not match");
    }

    //uniquie email, check db for existing user with same email

    $email_check_query = "SELECT * FROM user_profile WHERE email = '$email' LIMIT 1";

    $result = mysqli_query($db, $email_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        if($user['email'] === $email) {array_push($errors, "Email already registered, Use new email");
        }
    }

    // Register the user if no error

    if(count($errors) == 0) {

        $password = md5($password_1); //this is for encrypting password
        $query = "INSERT INTO user_profile (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
        
        mysqli_query($db, $query);
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        header('location: loginuser.php');

    }
}
?>