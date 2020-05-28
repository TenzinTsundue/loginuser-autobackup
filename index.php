<?php

session_start();

if(isset($_SESSION['email'])){

    $_SESSION['msg'] = "you must log in to view this page";
    header("location : loginuser.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location : loginser.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is the home page</h1>
    <?php
    if(isset($_SESSION['success'])) : ?>
    <div>
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
    <?php endif ?>

//if the user logs in print information about his

    <?php if(isset($_SESSION['email'])) : ?>
        <h3>Welcome <strong><?php echo $_SESSION['email']; ?></strong></h3>
        <button><a href= "index.php?logout="1"></a></button>
    <?php endif ?>


</body>
</html>

