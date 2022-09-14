<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>

<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="css/view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php

    include_once("dbconnection.php");

    if (isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $loginId = $_SESSION['id'];

        
        if (empty($name) || empty($age) || empty($salary)) {

            if (empty($name)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }

            if (empty($age)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }

            if (empty($salary)) {
                echo "<font color='red'>salary field is empty.</font><br/>";
            }

            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // if all the fields are filled (not empty) 

            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO emp(name, age, salary, login_id) VALUES('$name','$age','$salary', '$loginId')");

            //display success message
            echo "<font class='success'><strong>Data added successfully.</strong>";
            echo "<br/><br/> <a class='btn btn-primary' href='view.php'>View Result</a>";
        }
    }
    ?>
</body>

</html>