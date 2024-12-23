<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users List</title>
</head>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Access Level</th>
        </tr>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'lab_5b');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT matric, name, role FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['matric'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'> No users found </td></tr>";
        }

        $conn->close();
        ?>
        </table>
    </body>
    </html>