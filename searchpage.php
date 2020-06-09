<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Search Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
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
    </style>
  </head>
  <body>
  <nav class="navbar navbar-custom navbar-dark">
  <a class="navbar-brand" href="#"><strong>Tibet</strong> Knowledge</a>
        <ul class="nav navbar-nav ml-auto">
          <li>
            <a class="nav-link" href="loginuser.php">Submit <span class="sr-only">(current)</span></a>
          </li>
        </ul>
  </nav>

    <div class="search_page">
    <img class="home_logo" src="media/CTAKnowledgeManagement.png">
    <form class="search-container" action="searchresult.php" method="post">
      
      <input type="text" id="search-bar" placeholder="Tibet Knowledge Search" name="search">
      <button type="submit" name="submit" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
      <div class="form_check home_checkbox">
        <input type="checkbox" class="form-check-input" id="report_id" />
        <label class="form-check-label" for="report_id">Report </label>
        <input type="checkbox" class="form-check-input" id="project_id" />
        <label class="form-check-label" for="project_id">Project Proposals</label>
      </div>
     
      
      </form>
    </div>

  </body>
</html>

