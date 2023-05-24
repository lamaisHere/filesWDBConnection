<?php
// Establish a database connection
$conn = new mysqli("localhost:3306", "root", "", "darb_login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted current password and new password from the form
$currentPassword = $_POST['current-password'];
$newPassword = $_POST['new-password'];

// Prepare and execute a SELECT query to retrieve the stored password from the table
$query = "SELECT password FROM users LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Compare the submitted current password with the stored password
    if ($currentPassword == $storedPassword) {
        // Current password matches, update the password in the database
        $updateQuery = "UPDATE users SET password = '$newPassword' LIMIT 1";
        if ($conn->query($updateQuery) === TRUE) {
            // Password update successful
            echo "<script>alert('Password changed successfully'); window.location.assign('login.html');</script>";
        } else {
            // Password update failed
            echo "<script>alert('Failed to change password'); window.location.assign('login.html');</script>";
        }
    } else {
        // Current password doesn't match, display an error message
        echo "<script>alert('Incorrect current password'); window.location.assign('login.html');</script>";
    }
} else {
    // No user found in the database, display an error message
    echo "<script>alert('No user found'); window.location.assign('login.html');</script>";
}

// Insert password into the table
$insertQuery = "INSERT INTO users (password) VALUES ('$password')";
if ($conn->query($insertQuery) === TRUE) {
    echo "Password inserted successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
}


$conn->close();
?>
}

$conn->close();
?>
