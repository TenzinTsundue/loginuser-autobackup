<?php

if(isset($_POST['submit'])) {
    $valueToSearch = $_POST['search'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM document WHERE title LIKE '%$valueToSearch%'";
    $search_result = filterTable($query);
    
} else {
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

//connect to database
$connect = mysqli_connect("localhost", "root", "root", "loginuser");

// define how may results per page
$result_per_page = 5;

// Find out the number of results stored in database

$number_of_results = mysqli_num_rows($search_result);

// determine number of total page availabe
$number_of_pages = ceil($number_of_results/$result_per_page);

// determine which page number of visitor is currently on
if(!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
} 

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1) * $result_per_page;

// retrieve selected results from database and display them on page
$valueToSearch = $_POST['search'];
$sql ="SELECT * FROM document WHERE title LIKE '%$valueToSearch%' LIMIT $this_page_first_result ,$result_per_page" ;
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Search Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"  />
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
      <form class="search-container" action="searchresult.php" method="post">
        <lable><strong> Search </strong></label>
        <input type="text" id="search-bar" placeholder="Search" name="search" value="<?php echo $valueToSearch; ?>">
        <button type="submit" name="submit" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
        <!-- <a href="#" type="submit" name="submit"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a> -->
      </form>
      </div>

    <div class="filter">
    <form action="/action_page.php">
      <label><strong>Filters</strong></label>
      <div class="float-right">
        <input type="checkbox" name="reset_filter" value="reset_filter">
        <label for="reset_filter">Reset</label>
      </div>     
      <div class="filter_title"><strong>Sector</strong></div>
      <div class="filter_content">
        <ul>
          <li><input type="checkbox" name="education" value="education">
        <label for="education">Education</label></li>
        <li><input type="checkbox" name="enterpreneruship" value="enterpreneruship">
        <label for="enterpreneruship"> Enterpreneruship</label></li>
        <li><input type="checkbox" name="capacitybuilding" value="capacitybuilding">
        <label for="capacitybuilding">Capacity Building</label></li>
        <li><input type="checkbox" name="gender" value="gender">
        <label for="gender">Gender</label></li>
        <li><input type="checkbox" name="banking" value="banking">
        <label for="banking"> Banking</label></li>
        <li><input type="checkbox" name="artculture" value="artculture">
        <label for="artculture">Arts & Culture</label></li>        
        </ul>
      </div>
      <div class="filter_title"><strong>File Type</strong></div>
      <div class="filter_content">
        <ul>
          <li><input type="checkbox" name="documents" value="documents">
        <label for="documnets">Documents </label></li>
        <li><input type="checkbox" name="video" value="video">
        <label for="video"> Video</label></li>
        <li><input type="checkbox" name="audio" value="audio">
        <label for="audio"> Audio</label></li>
        <li><input type="checkbox" name="image" value="image" >
        <label for="image"> Image</label></li>   
        </ul>
      </div>  
      <div class="filter_title"><strong>Publication</strong></div>
      <div class="filter_content">
        <ul>
        <li><input type="checkbox" name="internal" value="internal">
        <label for="internal"> Internal</label></li>
        <li><input type="checkbox" name="external" value="external">
        <label for="external"> External</label></li>        
        </ul>        
      </div>
      <div class="filter_title"><strong>language</strong></div>
      <div class="filter_content">
        <ul>
        <li><input type="checkbox" name="english" value="english">
        <label for="english"> Englsih</label></li>
        <li><input type="checkbox" name="tibetan" value="Car">
        <label for="language"> Tibetan</label></li>
        <li><input type="checkbox" name="vehicle3" value="Boat" >
        <label for="language"> Hindi</label></li>
      </ul>
        
      </div>
        <button type="submit" name="apply_filter" name="apply_filter" class="float-right apply_button">Apply</button>
    </form>
    </div>
    <div class="search_count"">
      <em><?php 
      $count = mysqli_num_rows($search_result); 
      echo $count;
      ?> 
      Result found </em>
    </div>     
    
    <?php while($row = mysqli_fetch_array($result)):?>
    
    <div class="search_result">
    <div class="row">
      <div class="col-2">Image</div>
      <div class="col-7">
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
        <div class="searchresult_links">
          <a class="link_button" href="<?php echo $row['file_path']; ?>" target="_blank">View</a>
          <a class="link_button" href="<?php echo $row['file_path']; ?>" download>download</a>
        </div>
      </div>
      <div class="col-3"></div>
    </div> 
    </div> 

    <?php endwhile;?> 


    <nav aria-label="Page navigation example">
      <ul class="pagination">  
      <?php 
      // display the link to the pages
        $previous = $page -1 ;
        $next = $page +1 ;

        echo '<li class="page-item">
          <a class="page-link" href="searchresult.php?page=' . $previous . '" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>';
        for ($page=1; $page<=$number_of_pages; $page++) {
        echo '<li class="page-item"><a class="page-link" href="searchresult.php?page=' . $page . '">' . $page . '</a></li>';
        }
        echo '<li class="page-item">
          <a class="page-link" href="searchresult.php?page=' . $next . '" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>';
      ?>  
      </ul>
    </nav>

      
    
  </body>
</html>

