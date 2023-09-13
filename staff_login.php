<?php
$name = $_POST['teacher-username'];
$phone = $_POST['teacher-phone'];
$email_id = $_POST['teacher-mail'];
$password = $_POST['teacher-password'];
$con = new mysqli('localhost', 'root', '', 'embock');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO staff (name, phone, mail, password) VALUES ('$name', '$phone', '$email_id', '$password')";
$r = mysqli_query($con, $sql);

if ($r) {
    header("Location: http://localhost/EMBLOCK%20PROJECT/");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>
