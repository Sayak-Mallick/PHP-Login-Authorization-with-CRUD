<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("dbconnection.php");

$result = mysqli_query($mysqli, "SELECT * FROM emp WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC");
?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="css/view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="menu wrapper text-center">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add.html">Add New Data</a></li>
        </ul>
    </div>

    <br /><br />

    <div class="main-content">
        <table width="20%" class="table tbl-30 table-bordered table-responsive table-striped table-hover">
            <tr bgcolor='#CCCCCC'>
                <th>Login ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>salary</th>
                <th>Update</th>
            </tr>
            <?php
            
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr?>";
                echo "<td>". $res['id'] ."</td>";
                echo "<td>" . $res['name'] . "</td>";
                echo "<td>" . $res['age'] . "</td>";
                echo "<td>" . $res['salary'] . "</td>";
                echo "<td><a class='btn btn-primary' href=\"edit.php?id=$res[id]\">Edit</a> | <a class='btn btn-danger' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>
			</tr>";
            }
            ?>
        </table>
    </div>
    <br>
    <br><br>

    <div class="text-center">
        <a class="btn btn-danger" style="" href="logout.php">Logout</a>
    </div>


</body>

</html>