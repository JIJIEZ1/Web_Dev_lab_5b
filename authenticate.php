<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $password = $_pOST['password'];

    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password; $row['password'])) {
            $_SESSION('matric') = $matric;
            exit();
        } else {
            echo "Invalid username or password, try <a href='lab5b_q6.php'>login </login></a> again.";
        }
     } else {
            echo "invalid username or password, try <a href='lab5b_q6.php'>login</a> again.";
    }
}

$conn->close();
?>