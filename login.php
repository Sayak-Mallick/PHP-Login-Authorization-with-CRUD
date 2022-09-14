<?php session_start(); ?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- <a href="index.php">Home</a> <br /> -->
    <?php
    include("dbconnection.php");

    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($mysqli, $_POST['username']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

        if ($user == "" || $pass == "") {
            echo "Either username or password field is empty.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        } else {
            $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
                or die("Could not execute the select query.");

            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $validuser = $row['username'];
                $_SESSION['valid'] = $validuser;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
            } else {
                echo "Invalid username or password.";
                echo "<br/>";
                echo "<a href='login.php'>Go back</a>";
            }

            if (isset($_SESSION['valid'])) {
                header('Location: index.php');
            }
        }
    } else {
    ?>

        <div class="container" style=" width: 400px;">
            <form class="login-email" name="form1" method="post" action="">
                <p class="login-text text-center" style="font-size: 2rem; font-weight: 800;">Login</p>

                <div class="input-group">
                    <input placeholder="Enter Username" type="text" name="username">
                </div>
                <div class="input-group">
                    <input placeholder="Enter Password" type="password" name="password">
                </div>
                <div class="input-group">
                    <input class="btn" type="submit" name="submit" value="Submit">
                </div>
                <p class="login-register-text">To go back to the Home Page <a href="index.php">Click Here</a>.</p>
            </form>
        </div>

    <?php
    }
    ?>
</body>

</html>