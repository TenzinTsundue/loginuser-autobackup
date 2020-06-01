<?php

if(isset($_POST['submit']))
{
    $valueToSearch = $_POST['search'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM document WHERE title LIKE '%$valueToSearch%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM document";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "root", "loginuser");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Search Page</title>
    <link rel="stylesheet" href="css/indexstyle.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
      <br>
    <!-- Search result page -->
      <form action="searchresult.php" method="post">
        <label><strong>TK Search</strong></label>
        <input type="text" name="search" placeholder="search">
        <input type="submit" name="submit" value="GO">
      

      <br><br>
      <div class="container">
      <div class="row">
      <?php while($row = mysqli_fetch_array($search_result)):?>
        
        <div class="col-3">
          IMAGE IMAGE IMAGE
        </div>
        <div class="col-9">
          <h4><?php echo $row['title']; ?></h4>
          <p><?php echo $row['details']; ?></p>
          <p><?php echo $row['author']; ?></p>
          <p><em><?php echo $row['department']; ?></em></p>
          <button class="btn btn-primary">View</button>
          <button class="btn btn-outline-primary">Download</button>
          <br><br>
        </div>
        <?php endwhile;?> 
      </div>
      </div>
      </form>

  </body>
</html>

