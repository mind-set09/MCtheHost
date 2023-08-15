<?php
// Connect to your database
$db_connection = mysqli_connect("localhost", "username", "password", "database_name");

if (!$db_connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification_code = $_POST["verification_code"];

    // Check if the verification code matches the one stored in the database
    $query = "SELECT * FROM users WHERE verification_code = '$verification_code'";

    $result = mysqli_query($db_connection, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Mark the user's email as verified
        $update_query = "UPDATE users SET email_verified = 1 WHERE id = {$user['id']}";
        mysqli_query($db_connection, $update_query);

        // Redirect to the dashboard page
        header("Location: dashboard.html");
        exit();
    } else {
        // Error handling
        echo "Invalid verification code.";
    }

    mysqli_close($db_connection);
}
?>
