<?php






$conn = new mysqli("localhost", "root", "", "photo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = "";
$productname = "";
$description = "";
$category = "";
$current_timestamp = "";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
    if (isset($_POST["productname"])) {
        $productname = $_POST["productname"];
    }
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }
    if (isset($_POST["category"])) {
        $category = $_POST["category"]; 
    }
    if (isset($_POST["timestamp_column"])) {
        $current_timestamp = $_POST["timestamp_column"];
    }

    // Step 4: Insert data into the database
    $sql = "INSERT INTO `photo_d` (`id`, `productname`, `description`, `category`, `timestamp_column`) VALUES ('$id', '$productname', '$description', '$category', '$current_timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>product details</title>
</head>

<body>
    <!-- Step 2: Create an HTML form -->
    <form action="" method="post">



        <label for="productname">Productname</label>
        <input type="text" name="productname" required><br><br>

        <label for="description">Description</label>
        <input type="text" name="description" required><br><br>

        <label for="category">Category</label>
        <select name="category" required><br><br>







            <?php
            // Step 5: Fetch descriptions from the database and generate options
           $sql = "SELECT `id`, `description` FROM `db_photo`";


            $result = $conn->query($sql);
            if (!$result) {
                die("Query failed: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["description"] . '</option>';

                }
            } else {
                echo '<option value="">No descriptions found</option>';
            }

            



            ?>


        </select><br><br>



        <input type="hidden" name="timestamp_column" value="<?php echo date('Y-m-d H:i:s'); ?>">



        <input type="submit" value="Save">
    </form>
    
    



</body>

</html>