<?php


/*

$mysqli = new mysqli("localhost", "root", "", "photo");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$query = "SELECT * FROM `photo_d`";
$stmt = $mysqli->prepare($query);

if (!$stmt) {
    die("Query preparation failed: " . $mysqli->error);
}




if (!$stmt->execute()) {
    die("Query execution failed: " . $stmt->error);
}

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>productname</th><th>Description</th><th>category</th><th>Timestamp</th></tr>';
    while ($row = $result->fetch_assoc()) {
        // Access and display data from table1
        $id = $row['id'];
        $productname = $row['productname'];
        $description = $row['description'];
        $category = $row['category'];
        $timestamp_column = $row['timestamp_column'];

        // Output data in a table row
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$productname</td>";
        echo "<td>$description</td>";
        echo "<td>$category</td>";
        echo "<td>$timestamp_column</td>";
        echo "</tr>";

    }
} else {
    echo "No data found in table1.";
}

echo '</table>';




$stmt->close();

$mysqli->close();


*/






/*

$mysqli = new mysqli("localhost", "root", "", "photo");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM `photo_d`";
$stmt = $mysqli->prepare($query);

if (!$stmt) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$stmt->execute()) {
    die("Query execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

// Fetch descriptions from another table and store them in an associative array
$descriptions = [];
$queryDescriptions = "SELECT `id`, `description` FROM `db_photo`";
$resultDescriptions = $mysqli->query($queryDescriptions);
if ($resultDescriptions) {
    while ($rowDescription = $resultDescriptions->fetch_assoc()) {
        $descriptions[$rowDescription['id']] = $rowDescription['description'];
    }
}

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>productname</th><th>Description</th><th>category</th><th>Timestamp</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $productname = $row['productname'];
        $category = $row['category'];
        $category = isset($descriptions[$category]) ? $descriptions[$category] : "Description Not Found";
        //$description = isset($descriptions[$category]) ? $descriptions[$category] : "Description Not Found";
        $description = $row['description'];
        $timestamp_column = $row['timestamp_column'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$productname</td>";
        echo "<td>$description</td>";
        echo "<td>$category</td>";
        echo "<td>$timestamp_column</td>";
        echo "</tr>";
    }

} else {
    echo "No data found in table1.";
}

echo '</table>';

$stmt->close();
$mysqli->close();


*/

if (isset($_GET['id'])) {
    $selectedID = $_GET['id'];


    $mysqli = new mysqli("localhost", "root", "", "photo");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT * FROM `photo_d` WHERE `id`= ?";
    //$stmt = $conn->prepare($query);
   
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Query preparation failed: " . $mysqli->error);
    }
    $stmt->bind_param("i", $selectedID);

    if (!$stmt->execute()) {
        die("Query execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Fetch descriptions from another table and store them in an associative array
    $descriptions = [];
    $queryDescriptions = "SELECT `id`, `description` FROM `db_photo`";
    $resultDescriptions = $mysqli->query($queryDescriptions);
    if ($resultDescriptions) {
        while ($rowDescription = $resultDescriptions->fetch_assoc()) {
            $descriptions[$rowDescription['id']] = $rowDescription['description'];
        }
    }

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>productname</th><th>Description</th><th>category</th><th>Timestamp</th></tr>';
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $productname = $row['productname'];
            $category = $row['category'];
            $category = isset($descriptions[$category]) ? $descriptions[$category] : "Description Not Found";
            //$description = isset($descriptions[$category]) ? $descriptions[$category] : "Description Not Found";
            $description = $row['description'];
            $timestamp_column = $row['timestamp_column'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$productname</td>";
            echo "<td>$description</td>";
            echo "<td>$category</td>";
            echo "<td>$timestamp_column</td>";
            echo "</tr>";
        }
    }
} else {
    echo "No data found in table1.";
}

echo '</table>';

$stmt->close();
$mysqli->close();



?>