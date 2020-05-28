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
 
$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//form validation
//Requred field
/*
if(empty($first_name)) {array_push($errors, "First name is required");
}
if(empty($last_name)) {array_push($errors, "Last name is required");
}
if(empty($password_1)) {array_push($errors, "Password is required");
}
*/

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
    $query1 = "INSERT INTO user_profile (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
    $query2 = "INSERT INTO user (email, password) VALUES ('$email' , '$password')";
    
    mysqli_query($db, $query1);
    mysqli_query($db, $query2);
    $_SESSION['success'] = "You are now logged in";
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    header('location: index.php');

}

// login user

if (isset($_POST['login_user'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE email='$email' AND password ='$password' ";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows(@results)) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "Logged in successfully";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combimantion. please try again.");
        }
    }
}

?>