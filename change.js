<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>
    <form>
        <div>
            <label for="currentPassword">Current Password:</label>
            <input type="password" id="currentPassword" required>
        </div>
        <div>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" required>
        </div>
        <div>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" required>
        </div>
        <div>
            <button type="button" onclick="changePassword()">Change Password</button>
        </div>
    </form>

    <script>
        function changePassword() {
            // Retrieve the input values
            var currentPassword = document.getElementById('currentPassword').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            // Perform validation checks
            if (newPassword !== confirmPassword) {
                alert('New password and confirm password do not match.');
                return;
            }

            // Make an AJAX request to update the password
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('Password changed successfully.');
                        // Redirect the user to a success page or perform other actions
                    } else {
                        alert('Failed to change password. Please try again.');
                    }
                }
            };
            
            xhr.open('POST', 'changepassword.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('currentPassword=' + encodeURIComponent(currentPassword) +
                '&newPassword=' + encodeURIComponent(newPassword));

            // Clear the input fields
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
        }
    </script>
</body>

</html>
  
