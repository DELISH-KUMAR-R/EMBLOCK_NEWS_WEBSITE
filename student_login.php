<?php
$name = $_POST['student-username'];
$phone = $_POST['student-phone'];
$email_id = $_POST['student-mail'];
$password = $_POST['student-password'];

$con = new mysqli('localhost', 'root', '', 'embock');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO student (name, phone, mail, password) VALUES ('$name', '$phone', '$email_id', '$password')";
$r = mysqli_query($con, $sql);

if ($r) {
    header("Location: http://localhost/EMBLOCK%20PROJECT/");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>
