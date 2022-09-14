<html>

<head>
    <title>Register</title>
</head>
<link rel="stylesheet" href="css/login.css">

<body >
    <!-- <a href="index.php">Home</a> <br /> -->
    <?php
    include("dbconnection.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if ($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
                or die("Could not execute the insert query.");

            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
        }
    } else {
    ?>
        <div class="container">
            <form class="login-email" name="form1" method="post" action="">
                <p class="login-text text-center" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="input-group">
                    <input placeholder="Enter your Full Name" type="text" name="name">
                </div>
                <div class="input-group">
                    <input placeholder="Enter your Email" type="text" name="email">
                </div>
                <div class="input-group">
                    <input placeholder="Enter your Username" type="text" name="username">
                </div>
                <div class="input-group">
                    <input placeholder="Enter your password" type="password" name="password">
                </div>
                <div class="input-group">
                    <input class="btn" type="submit" name="submit" value="Submit">
                </div>
                <p class="login-register-text">To go back to Home Page <a href="index.php">Click Here</a>.</p>
            </form>
        </div>

    <?php
    }
    ?>
</body>

</html>