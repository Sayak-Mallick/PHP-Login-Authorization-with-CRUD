<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Home Page</title>
</head>

<body>
    <div id="header">
        <h1 class="text-center"> <strong> Welcome to my page!!!!!</strong> </h1> <br> <br>
    </div>

    <?php
    if (isset($_SESSION['valid'])) {
        include("dbconnection.php");
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>

        <div class='text-center' style='margin-top: 140px;'>
            Welcome <?php echo $_SESSION['name']  ?> |
            Your Login ID is:- <?php echo $_SESSION['id'] ?>
            <br> <br> <a class='btn btn-primary' href='logout.php'>Logout</a> |
            <a style="color: white;" class="btn btn-secondary" href='view.php'>View and Add Employees</a>
        </div>
        <br /><br />
    <?php
    } else {
        echo "<div class='text-center' style='margin-top: 160px;'><a class='btn btn-primary' href='login.php'>Login</a> | <a class='btn btn-secondary' href='register.php'>Register</a></div>";
    }
    ?>

    <!---Footer Section Starts--->
    <footer class="footer">
        <div class="wrapper">
            <p  class="text-center">2022 Developed By <a style="text-decoration: none;" href="https://github.com/Sayak-Mallick">Sayak Mallick</a></p>
        </div>
    </footer>
    <!---Footer Section Ends--->
</body>

</html>