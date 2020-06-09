
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

        $query = "SELECT * FROM user WHERE email='$email' AND password ='$password'";
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

<?php
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>


<?php
    $servername = "localhost";
    $database = "loginuser";
    $username = "root";
    $password = "root";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $details = mysqli_real_escape_string($db, $_POST['details']);
    $file_type = mysqli_real_escape_string($db, $_POST['file_type']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $language = mysqli_real_escape_string($db, $_POST['language']);
    $tags = mysqli_real_escape_string($db, $_POST['tags']);
    $category = mysqli_real_escape_string($db, $_POST['category']);

    if(!empty($_FILES['uploaded_file']))
    {
        $path = "uploads/";
        $path = $path . basename( $_FILES['uploaded_file']['name']);

        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
        " has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }


    $query = "INSERT INTO document (title, author, details, file_path, file_type, department, language, tags, category) VALUES ('$title', '$author', '$details', '$path', '$file_type', '$department', '$language', '$tags', '$category')";
    if (mysqli_query($db, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

   

?>

<!-- Radio button hidden form -->

Yes <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"> No <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"><br>
    <div id="ifYes" style="visibility:hidden">
        If yes, explain: <input type='text' id='yes' name='yes'><br>
        What can we do to accommodate you?  <input type='text' id='acc' name='acc'>
    </div>

<script>
    function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';
    }
</script>

<!-- upload -->

<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>

/*https://gist.github.com/taterbase/2688850*/

<form action="searchresult.php" method="post">
      <lable><strong>TK Search</strong></label>
      <input type="text" name="search" placeholder="search">
      <input type="submit" name="submit" value="GO">
      </form>