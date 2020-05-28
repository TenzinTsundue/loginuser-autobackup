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
    <script>
      $(document).ready(function () {
        $(".default_option").click(function () {
          $(".dropdown ul").addClass("active");
        });

        $(".dropdown ul li").click(function () {
          var text = $(this).text();
          $(".default_option").text(text);
          $(".dropdown ul").removeClass("active");
        });
      });
    </script>
  </head>
  <body>
    <!-- Navagation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"><strong>Tibet</strong> Knowledge</a>
        <ul class="nav navbar-nav ml-auto">
          <li>
            <a class="nav-link" href="loginuser.php"
              >Submit <span class="sr-only">(current)</span></a
            >
          </li>
        </ul>
      </div>
    </nav>

    <!--Search Box-->
    <div class="container-fluid">
      <div class="wrap">
        <img class="main_logo" src="media/cta_logo.png" />
        <div class="search">
          <input type="text" class="input" placeholder="Search" />
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="report_id" />
          <label class="form-check-label" for="report_id">Report</label>
          <input type="checkbox" class="form-check-input" id="project_id" />
          <label class="form-check-label" for="project_id"
            >Project Proposals</label
          >
        </div>
      </div>
    </div>
  </body>
</html>
