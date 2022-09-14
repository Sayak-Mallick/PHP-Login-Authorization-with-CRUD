<?php session_start(); ?>

<?php
include_once("dbconnection.php");
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $result = mysqli_query($mysqli, "UPDATE emp SET name='$name', age='$age', salary='$salary' WHERE id=$id");
    header("Location: view.php");
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM emp WHERE id=$id");
$row = mysqli_num_rows($result);
if ($row > 0) {
while ($res = mysqli_fetch_array($result)) {
    $name = $res['name'];
    $age = $res['age'];
    $salary = $res['salary'];
}}else{
    echo "No Records Found";
    header('Location:index.php');
}
?>
<html>

<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/view.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
</head>

<body>
    <div class="menu wrapper text-center">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="view.php">View Employee Details</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- <a href="index.php">Home</a> | <a href="view.php">View Employee Details</a> | <a href="logout.php">Logout</a> -->
    <br /><br />

    <form name="form1" method="post" action="edit.php">
        <table class="table tbl-30 table-bordered table-responsive table-striped table-hover">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age; ?>"></td>
            </tr>
            <tr>
                <td>salary</td>
                <td><input type="text" name="salary" value="<?php echo $salary; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input class='btn btn-primary' type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>