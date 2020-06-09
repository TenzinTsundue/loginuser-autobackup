<?php 

session_start();

//initialising variable
$first_name = "";
$last_name = "";
$email = "";

$errors = array();

//connect to db

$db = mysqli_connect('localhost','root','root','loginuser') or die("could not connect to database");


if (isset($_POST['login_user'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
      array_push($errors, "Email is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $password = md5($password);

      $query = "SELECT * FROM user_profile WHERE email='$email' AND password ='$password' ";
      $results = mysqli_query($db, $query);
      
      if(mysqli_num_rows($results)) {
          //fetch data
          $uid = mysqli_fetch_array($results);

          $_SESSION['email'] = $email;
          $_SESSION['first_name'] = $uid['first_name'];
          $_SESSION['last_name'] = $uid['last_name'];
          $_SESSION['success'] = "Logged in successfully";
          header('location: userupload.php');
      } else {
          array_push($errors, "Wrong username/password combimantion. please try again.");
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login user</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- CSS only -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <!-- JS, Popper.js, and jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="sessionerror">
  <?php include('errors.php') ?>
  </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6 loginregister">
            <div class="row">
            <div class="col-md-6">
                <div class="memberlogin">
                    <h3>MEMBER LOGIN</h3>
                    <form action="loginuser.php" method="POST">      
                        <div>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required/>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required/>
                        </div> 
                        
                        <a href="#">Forgot Password?</a>   
                        <div class="loginbutton">
                          <button type="submit" class="btn btn-light" name="login_user">LOGIN</button>
            
                        </div>                    
                    </form>
                    <a href="signupuser.php" class="createaccount">Create an accout</a> 
                </div>
            </div>
            
            <div class="col-6">
            <div class="createaccout">
              <img class="loginimage" src="media/loginimage.jpg">
            </div>
            </div>
        </div>
        <div class="col-3"> 
        </div>
      </div>
    </div>
  </body>
</html>
