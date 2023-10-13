<?php




// Connect to the MySQL database
$conn = new mysqli("localhost","root","","photo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    // File upload handling
    $uploadDir = "simple-dash"; // Directory where uploaded photos will be stored
   // $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
   $uploadFile = basename($_FILES["photo"]["name"]);

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            // Insert the photo information into the database
            $sql = "INSERT INTO db_photo (filename, description) VALUES ('$uploadFile', '$description')";

            if ($conn->query($sql) === TRUE) {
                echo "Photo uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    // Close the database connection
    $conn->close();
}
?>







<!DOCTYPE html>
<html>

<head>
    <title>Photo Upload</title>
    <link rel="stylesheet" href="category.css">
</head>

<body>
    <h1>Upload a Photo</h1>
    <form action="category.php" method="POST" enctype="multipart/form-data">
    </br>
    <input class="file" type="file" name="photo" accept="image/*">
    </br>
    <input type="text" name="description" placeholder="Photo Description">
    </br>
    <input class="upload" type="submit" name="upload" value="Upload">
    </br>
    </br>
    
    </form>

    
</body>

</html>