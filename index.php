<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_5b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>" .
            "<td>" . $row["matric"] . "</td>" .
            "<td>" . $row["name"] . "</td>" .
            "<td>" . $row["role"] . "</td>" .
            "<td>
                <a href='update.php?matric=" . $row["matric"] . "'>Update</a>
                <a href='delete.php?matric=" . $row["matric"] . "'>Delete</a>
            </td>" .
        "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();

?>
