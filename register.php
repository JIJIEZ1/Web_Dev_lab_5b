<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration Page</title>
    </head>
    <body>
        <h2>Register Form</h2>
        <form action="" method="post">
            <label for="matric">Matric</label>
            <input type="text" name="matric" required><br><br>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br><br>

            <label for="password">password</label>
            <input type="password" name="password" id="password" required><br><br>
            
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="">Please Select</option>
                <option value="student">Student</option>
                <option value="Lecturer">Lecturer</option>
                <option value="Admin">Admin</option>
            </select><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER['REQUEST METHOD'] === 'POST') {
            $matric = $_POST['matric'];
            $name = $POST['name'];
            $password = password_hash($POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $conn = new mysqli('localhost', 'root', '', 'lab_5b');

            if ($conn->connect_error) {
                die("connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO users (matric, name, password, role) VALUES (?,?,?,?)");
            $stmt ->bind_param('ssss', $matric, $name, $password, $role);

            if ($stmt->execute()) {
                echo "<p>Registration succesful!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </body>
</html>