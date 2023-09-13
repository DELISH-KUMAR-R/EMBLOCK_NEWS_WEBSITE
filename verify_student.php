<?php
// Connect to your MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'embock');

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve user input
$email = $_POST['student-username'];
$password = $_POST['student-password'];

// Query the database
$query = "SELECT * FROM student WHERE mail = '$email' AND password = '$password'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Check if credentials are correct
if (mysqli_num_rows($result) === 1) {
    // Correct credentials, redirect to home.html
    setcookie('mail_id',$email);
    header("Location: display_image.php");
    exit();
} else {
    // Incorrect credentials, redirect to index.html
    header("Location: http://localhost/EMBLOCK%20PROJECT/");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>
