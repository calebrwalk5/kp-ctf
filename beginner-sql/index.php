<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ctf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<p>Login successful! Welcome, " . htmlspecialchars($username) . ".</p>";
        if ($username == 'admin') {
            echo "<p>Congratulations! You've found the flag: FLAG{}</p>";
        }
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beginner Kernel Panic CTF Challenge</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
