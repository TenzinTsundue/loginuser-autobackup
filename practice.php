<?php
    $servername = "localhost";
    $database = "loginuser";
    $username = "root";
    $password = "root";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (isset($_POST['upload'])) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $details = $_POST['details'];
        $file_type = $_POST['file_type'];
        $department = $_POST['department'];
        $language = $_POST['language'];
        $tags = $_POST['tags'];
        $category = $_POST['category'];

        #file name with a random number for similarity issues problem
        #$pname = rand(1000,10000)."-".$_FILES["uploaded_file"]["name"];

        #temporary file name to store file
        $tname = $_FILES["uploaded_file"]["tmp_name"];

        #upload directory path
        $upload_dir = 'uploads/';

        $dname = $upload_dir . basename($_FILES['uploaded_file']['name']);

        #to move the uploaded file to specific location
        move_uploaded_file($tname, $dname);

        #sql query to insert into database
        $query = "INSERT INTO document (title, author, details, file_path, file_type, department, language, tags, category) VALUES ('$title', '$author', '$details', '$dname', '$file_type', '$department', '$language', '$tags', '$category')";
        
        $filename= basename($_FILES['uploaded_file']['name']);
        
        if (mysqli_query($conn, $query)) {
            header('location: thankyou.php?filename='.$filename.'');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
  