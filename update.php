<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("connection failed : " . $conn->connect_error);
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated succcessfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
</head>
<body>

<h2>Update User</h2>

<form method="post" action="">
    Matric:<br>
    <input type="text" name="matric" value="<?php echo $row['matric']; ?>">
    <br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <br><br>
    <input type="text" name="role" value="<?php echo $row['role']; ?>">
    <br><br>
    <input type="submit" name="update" value="update">
    <a href = "index.php">Cancel</a>
</form>
</body>
</html>