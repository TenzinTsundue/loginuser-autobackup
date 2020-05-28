<?php include('server.php'); ?>

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
    <div class="container-fluid">
      <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6 loginregister">
            <div class="row">
            <div class="col-md-6">
                <div class="memberlogin">
                    <h3>MEMBER LOGIN</h3><br>
                    <form action="loginuser.php" method="POST">
                        
                        <div>
                            <label for="email">Email</label><br />
                            <input type="email" class="form-control" name="email" required/>
                        </div>
                        <div>
                            <label for="password">Password</label><br />
                            <input type="password" class="form-control" name="password" required/>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-light" name="login_user">LOGIN</button><br />
                        <a href="#">Forgot Password?</a>  
                    </form>
                </div>
            </div>
            
            <div class="col-6">
            <div class="createaccout">
            <h3>CREATE ACCOUNT</h3><br>
            <form action="loginuser.php" method="POST">
            <?php include('errors.php') ?>
                <div class="row">
                    <div class="col-md">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="col-md">
                    <label for="firstname">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                    </div>
                </div>
                <div>
                    <label for="email">Your Email</label><br />
                    <input type="email" class="form-control" name="email" required/>
                </div>
                <div class="row">
                    <div class="col-md">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password_1" required>
                    </div>
                    <div class="col-md">
                    <label for="password">Confirm password</label>
                    <input type="password" class="form-control" name="password_2" required>
                    </div>
                </div>
                
                <input type="checkbox" name="agree" />
                <label for="agree">
                    I agree to the <a href="#">Term and Condition</a></label
                ><br />
                <button type="submit" class="btn btn-primary">REGISTER</button>
                <br><br>
                </div>
            </form>
            </div>
            </div>
        </div>
        <div class="col-3"> 
        </div>
      </div>
    </div>
  </body>
</html>
