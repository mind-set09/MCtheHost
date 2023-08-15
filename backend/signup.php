<?php
// Connect to your database
$db_connection = mysqli_connect("localhost", "username", "password", "database_name");

if (!$db_connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password (use proper password hashing methods like bcrypt)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into the database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if (mysqli_query($db_connection, $query)) {
        // Successfully signed up
        // Redirect to email verification page
        header("Location: verify_email.html");
        exit();
    } else {
        // Error handling
        echo "Error: " . $query . "<br>" . mysqli_error($db_connection);
    }

    mysqli_close($db_connection);
}
?>
