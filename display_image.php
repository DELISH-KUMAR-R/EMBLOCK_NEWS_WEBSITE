<?php
// Database connection (replace with your own database credentials)
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "embock";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve image records from the database
$sql = "SELECT id, image_name, image_data, image_type FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $image_name = $row["image_name"];
        $image_data = $row["image_data"];
        $image_type = $row["image_type"];

        // Display the image using data URI (base64 encoded)
        echo "<img src='data:$image_type;base64," . base64_encode($image_data) . "' alt='$image_name'><br>";
    }
} else {
    echo "No images found in the database.";
}

$conn->close();*/

// Database connection (replace with your own database credentials)


// Database connection (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "embock";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve image records from the database
$sql = "SELECT id, image_name, image_data, image_type FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div style="max-width: 400px;">'; // Set the maximum width for the container div

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $image_name = $row["image_name"];
        $image_data = $row["image_data"];
        $image_type = $row["image_type"];

        // Display the image using data URI (base64 encoded)
        echo "<div style='margin-bottom: 20px;'>";
        echo "<img src='data:$image_type;base64," . base64_encode($image_data) . "' alt='$image_name' style='max-width: 100%;'>";
        echo "<p>$image_name</p>";
        echo "</div>";
    }

    echo '</div>'; // Close the container div
} else {
    echo "No images found in the database.";
}

$conn->close();



?>


