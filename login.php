<?php
// Establish a database connection
$conn = new mysqli("localhost:3306", "root", "", "darb_login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted password from the form
$password = $_POST['password'];

// Prepare and execute a SELECT query to retrieve the stored password from the table
$query = "SELECT password FROM users LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Compare the submitted password with the stored password
    if ($password == $storedPassword) {
        // Passwords match, login successful
        echo "<script>alert('Login Successful'); window.location.assign('index.php');</script>";
    } else {
        // Passwords don't match, display an error message
        echo "<script>alert('Incorrect password'); window.location.assign('login.html');</script>";
    }
} else {
    // No user found in the database, display an error message
    echo "<script>alert('No user found'); window.location.assign('login.php');</script>";
}

$conn->close();
?>
