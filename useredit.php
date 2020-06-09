<?php
  
  include 'connect.php';

  $num = 1;

  $sql ="SELECT * FROM document" ;
  $result = mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
    <!-- Side bar -->
    <div class="sidebar">
        <h2>TK</h2>
        <ul>
          <li><a href="userupload.php">Upload</a></li>
          <li class="activemode"><a href="useredit.php">Edit</a></li>
          <li><a href="userview.php">View</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="bottom_sidebar">
          <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="header">
        Welcome!! Have a nice day.
    </div>
    
        <div class="main_content">
        <div class="contain_form">
                <h3>Edit your entry</h3>
                <table class="table_class">
                  <tr class="table_head">  
                    <th>S.no</th>
                    <th style="width: 470px;">Title</th>
                    <th>Author</th>
                    <th>Document</th>
                    <th colspan="2">Functions</th>
                  </tr>
                  <tr>
                  <?php while($row = mysqli_fetch_array($result)):?>
                    <td><?php echo $num.'.' ; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><a href="<?php echo $row['file_path']; ?>" target="_blank">File</td>
                    <td>
                      <a class="btn btn-success btn-sm" data-toggle="collapse" href="#<?php echo 'view'.$num ; ?>" role="button" aria-expanded="false" aria-controls="collapseView">View</a> 
                      <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#<?php echo 'edit'.$num ; ?>" role="button" aria-expanded="false" aria-controls="collapseEdit">Edit</a>  
                    </td>
                    <td> 
                      <form method="POST">
                      <input type="submit" class="btn btn-danger btn-sm" name="<?php echo 'delete'.$num ; ?>" value="Delete">
                      </form>
                      
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6">
                      <?php
                            // Delete a row 
                            $title = $row['title'] ;
                            $row_to_delete = "delete$num" ;
                            if(isset($_POST[$row_to_delete])) {
                              
                              $sql = "DELETE FROM document WHERE title = '$title'" ;
                              if(mysqli_query($conn, $sql)){
                                echo "Delete Successfull / Refresh to check " ;
                              }else {
                                echo "Unable to Delete";
                              }
                            }
                        ?>
                        <?php
                          // Delete a row 
                          $id = $row['doc_id'] ;
                          $row_to_update = "update$num" ;
                          if(isset($_POST[$row_to_update])) {
                            
                            $title = $_POST['title'];
                            $author = $_POST['author'];
                            $details = $_POST['details'];
                            $file_type = $_POST['file_type'];
                            $department = $_POST['department'];
                            $language = $_POST['language'];
                            $tags = $_POST['tags'];
                            $category = $_POST['category'];
                            $publication = $_POST['publication'];
                            $sector = $_POST['sector'];
                            $include = $_POST['include'];

                            #temporary file name to store file
                            $tname = $_FILES["uploaded_file"]["tmp_name"];

                            #upload directory path
                            $upload_dir = 'uploads/';

                            $dname = $upload_dir . basename($_FILES['uploaded_file']['name']);

                            #to move the uploaded file to specific location
                            move_uploaded_file($tname, $dname);

                            #sql query to insert into database
                            $query = "UPDATE document SET title='$title', author='$author', details='$details', file_path='$dname', file_type='$file_type', department='$department', language='$language', tags='$tags', category='$category', publication='$publication', sector='$sector', include='$include' WHERE doc_id=$id";
                            // mysqli_query($conn, $sql);

                            if (mysqli_query($conn, $query)) {
                              echo "UPDATING Successfull / Refresh to check";
                            } else {
                                echo "Error updating" ;
                            }
                            
                          }
                        ?>
                        <!-- Collpse for the view buttion -->
                        <div class="collapse" id="<?php echo 'view'.$num ; ?>">
                          <div class="card card-body collpaseDiv">
                            <form action="useredit.php" method="POST">
                              <p><strong>Entry details</strong></p>
                              <hr>
                              <p><strong>Title:</strong> <?php echo $row['title']; ?></p>
                              <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
                              <p><strong>Details:</strong> <?php echo $row['details']; ?></p>
                              <p><strong>File name:</strong> view/Download</p>
                              <p><strong>File type:</strong> <?php echo $row['file_type']; ?></p>
                              <p><strong>Departments:</strong> <?php echo $row['department']; ?></p>
                              <p><strong>Language:</strong>: <?php echo $row['language']; ?></p>
                              <p><strong>Tags:</strong> <?php echo $row['tags']; ?></p>
                              <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                              <p>If condition to show futher details</p>
                            </form>
                          </div>
                        </div>
                        <!-- Collpse for the edit buttion -->
                        <div class="collapse" id="<?php echo 'edit'.$num ; ?>">
                          <div class="card card-body collpaseDiv">
                            <form action="useredit.php" method="POST">
                              <p><strong>Edit this entry</strong></p>
                              <hr>
                              <div class="form-row">
                                <div class="form-group col-md-1">
                                  <label for="title">Title:</label>
                                </div>
                                <div class="form-group col-md-6">   
                                  <input type="text" class="form-control" name="title" value= "<?php echo $row['title']; ?>" required/>
                                </div>
                                <div class="form-group col-md-1">
                                  <label for="author">Author:</label>
                                </div>  
                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control" name="author" value= "<?php echo $row['author']; ?>" required/>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                  <label for="details">Details:</label>
                                </div>
                                <div class="form-group col-md-11">
                                  <input type="text" class="form-control" name = "details" value= "<?php echo $row['details']; ?>" required/>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                  <label>File:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <input type="file" name="uploaded_file" required></input>
                                </div>
                                <div class="form-group col-md-1">
                                  <label for="file_type"><strong>File type:</strong></label>
                                </div>
                                <div class="form-group col-md-6">  
                                  <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="document" <?php if ($row[file_type] == 'document') {echo 'checked';} ?> required>Document</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="video" <?php if ($row[file_type] == 'video') {echo 'checked';} ?> >Video</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="audio" <?php if ($row[file_type] == 'audio') {echo 'checked';} ?> >Audio</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="image" <?php if ($row[file_type] == 'image') {echo 'checked';} ?> >Image</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="other" <?php if ($row[file_type] == 'other') {echo 'checked';} ?> >Other</label>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-2">
                                  <label for="department">Department:</label>
                                </div>
                                <div class="form-group col-md-5">
                                  <input list="department" class="form-control" type="text" name="department" value= "<?php echo $row['department']; ?>" required>
                                  <datalist id="department">
                                      <option value="Department of Finance"/>
                                      <option value="Department of Health"/>
                                      <option value="Department of Eduction"/>
                                      <option value="Department of Information and International Relation"/>
                                      <option value="Department of Religion and Culture"/>
                                      <option value="Department of Security"/>
                                      <option value="Department of Home"/>
                                      <option value="Kashag"/>
                                      <option value="Supreme Justice Court"/>
                                      <option value="Tibetan Parliament-in-Exile"/>
                                  </datalist>
                                </div>
                                <div class="form-group col-md-1">
                                  <label for="language">Language:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <label class="block"><input class="form-check-inline" type="radio" name="language" value="Tibetan" <?php if ($row[language] == 'Tibetan') {echo 'checked';} ?> required>Tibetan</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="language" value="English" <?php if ($row[language] == 'English') {echo 'checked';} ?> >Englsih</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="language" value="Hindi" <?php if ($row[language] == 'Hindi') {echo 'checked';} ?> >Hindi</label>
                                  <label class="block"><input class="form-check-inline" type="radio" name="language" value="Other" <?php if ($row[language] == 'Other') {echo 'checked';} ?> >Other</label>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                  <label for="tags">Tags:</label>
                                </div>
                                <div class="form-group col-md-11">
                                  <input type="text" class="form-control" name="tags" value= "<?php echo $row['tags']; ?>" />
                                </div>
                              </div>
                                

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                  <label for="categry">Category:</label>
                                </div>
                                <div class="form-group col-md-1">
                                  <label class="block"><input type="radio" name="category" value="Report"  <?php if ($row[category] == 'Report') {echo 'checked';} ?> >Report</label>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="publication">Publication:</label>
                                </div>
                                <div class="form-group col-md-3">
                                  <select name="publication" class="form-control" id="publication">
                                        <option></option>
                                        <option value="Internal" <?php if ($row[publication] == 'Internal') {echo 'selected';} ?> >Internal</option>
                                        <option value="External" <?php if ($row[publication] == 'External') {echo 'selected';} ?> >External</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                  <label for="sector">Sector:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <input list="sector" class="form-control" type="text" name="sector" id="sector" value= "<?php echo $row['sector']; ?>">
                                    <datalist id="sector">
                                        <option value="Education"/>
                                        <option value="Entrepreneurship"/>
                                        <option value="Capacity Building"/>
                                        <option value="ISDP"/>
                                        <option value="Gender"/>
                                        <option value="Banking"/>
                                        <option value="Arts & Culture"/>
                                        <option value="WASH"/>
                                        <option value="Workforce"/>
                                        <option value="Healthcare"/>
                                        <option value="Agriculture"/>
                                        <option value="Democracy"/>
                                    </datalist>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                </div>
                                <div class="form-group col-md-1">
                                  <label class="block"><input  type="radio" name="category" value="Project" <?php if ($row[category] == 'Project') {echo 'checked';} ?> >Project</label>
                                </div>
                                <div class="form-group col-md-1">
                                  <label for="include">Include:</label> 
                                </div>
                                <div class="form-group col-md-4">
                                  <input list="include" class="form-control" type="text" name="include" id="include" value= "<?php echo $row['include']; ?>">
                                    <datalist id="include">
                                        <option value="Budget"/>
                                        <option value="Policy"/>
                                        <option value="Guidelines"/>
                                        <option value="M&E"/>
                                        <option value="Timeline"/>
                                        <option value="Financial Report"/>
                                    </datalist>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-1">
                                </div>
                                <div class="form-group col-md-2">
                                <label class="block"><input type="radio" name="category" value="General" <?php if ($row[category] == 'General') {echo 'checked';} ?> >General</label>
                                </div>
                                <div class="form-group col-md-9">
                                </div>
                              </div>

                              <button type="submit" class="btn btn-primary float-right" name="<?php echo 'update'.$num ; ?>">Update</button>
                              
                            </form>
                            
                          </div>
                        </div>
                    
                    </td>
                  </tr>
                  <?php $num = $num + 1; ?>
                  <?php endwhile;?> 
                </table> 
                     
                
            
        </div>
        </div>
    
    
</body>
</html>












