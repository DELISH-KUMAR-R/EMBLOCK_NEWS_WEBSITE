<?php
if (isset($_POST['submit'])) {
    // Database connection (replace with your own database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "embock";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload handling
    $image_name = $_FILES["image"]["name"];
    $image_type = $_FILES["image"]["type"];
    $image_data = file_get_contents($_FILES["image"]["tmp_name"]);

    // SQL statement to insert image data into the database
    $sql = "INSERT INTO images (image_name, image_data, image_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $image_name, $image_data, $image_type);

    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
