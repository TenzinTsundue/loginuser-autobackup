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
        $pname = rand(1000,10000)."-".$_FILES["uploaded_file"]["name"];

        #temporary file name to store file
        $tname = $_FILES["files"]["tmp_name"];

        #upload directory path
        $upload_dir = '/uploads';

        #to move the uploaded file to specific location
        move_iploaded_file($tname, $uploads_dir.'/'.$pname);

        #sql query to insert into database
        $query = "INSERT INTO document (title, author, details, file_path, file_type, department, language, tags, category) VALUES ('$title', '$author', '$details', '$pname', '$file_type', '$department', '$language', '$tags', '$category')";
        
        if (mysqli_query($db, $query)) {
            header('location: thankyou.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
  
?>

<?php
  $db = new PDO("mysql:host=localhost; dbname=loginuser", 'root','root');

  if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $db->prepare("SELECT * FROM 'document' WHERE title = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth->execute();

    if($row = $sth->fetch())
    {
      ?> 
      <br><br>
      <table>
        <tr>
          <td>IMAGE</td>
          <td>
          <h4><?php echo $row->title; ?></h4>
          <p><?php echo $row->details; ?></p>
          <p><?php echo $row->author; ?></p>
          <p><?php echo $row->department; ?></p>
          <button class="btn btn-primary">Download</button>
          
          </td>
        </tr>
      </table>
    <?php
    }
    else{
      echo "Name does not exist";
    }
  }
  ?> 