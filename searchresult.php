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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
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
      <!-- Search result page -->
      <div class="search_form">
      <form action="searchresult.php" method="post">
      <label><strong>TK Search</strong></label>
      <input type="text" name="search" placeholder="search">
      <input type="submit" name="submit" value="GO">
      </form>
      </div>

    <div class="filter">
    <form action="/action_page.php">
      <p>Sector</p>
        <input type="checkbox" name="education" value="education">
        <label for="education">Education</label><br>
        <input type="checkbox" name="enterpreneruship" value="enterpreneruship">
        <label for="enterpreneruship"> Enterpreneruship</label><br>
        <input type="checkbox" name="capacitybuilding" value="capacitybuilding">
        <label for="capacitybuilding">Capacity Building</label><br>
        <input type="checkbox" name="gender" value="gender">
        <label for="gender">Gender</label><br>
        <input type="checkbox" name="banking" value="banking">
        <label for="banking"> Banking</label><br>
        <input type="checkbox" name="artculture" value="artculture">
        <label for="artculture">Arts & Culture</label>
      <p>File Type</p>
        <input type="checkbox" name="documents" value="documents">
        <label for="documnets">Documents </label><br>
        <input type="checkbox" name="video" value="video">
        <label for="video"> Video</label><br>
        <input type="checkbox" name="audio" value="audio">
        <label for="audio"> Audio</label><br>
        <input type="checkbox" name="image" value="image" >
        <label for="image"> Image</label><br>
      <p>Publication</p>
        <input type="checkbox" name="internal" value="internal">
        <label for="internal"> Internal</label><br>
        <input type="checkbox" name="external" value="external">
        <label for="external"> External</label>
      <p>language</p>
        <input type="checkbox" name="english" value="english">
        <label for="english"> Englsih</label><br>
        <input type="checkbox" name="tibetan" value="Car">
        <label for="language"> Tibetan</label><br>
        <input type="checkbox" name="vehicle3" value="Boat" >
        <label for="language"> Hindi</label><br>
        <input type="submit" value="Apply">
    </form>
    </div>
    <div class="search_count"">
      <em><?php 
      $count = mysqli_num_rows($search_result); 
      echo $count;
      ?> 
      Result found </em>
    </div>     
    
    <?php while($row = mysqli_fetch_array($search_result)):?>

    <div class="search_result">
      <strong><?php echo $row['title']; ?></strong><br>
      <!-- first 150 character to show -->
      <?php 
        if (strlen($row['details']) > "150") {
          echo substr($row['details'], 0, 150)."...";
        } else {
          echo $row['details'];
        }
      ?><br>
      <?php echo $row['author']; ?>
      <p><em><?php echo $row['department']; ?></em></p>
      <a class="link_button" href="<?php echo $row['file_path']; ?>" target="_blank">View</a>
      &nbsp;&nbsp;
      <a class="link_button" href="<?php echo $row['file_path']; ?>" download>download</a>
    </div>  

    <?php endwhile;?> 
     
  </body>
</html>

