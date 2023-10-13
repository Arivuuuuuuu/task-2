<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            position: fixed;
            height: 100%;
            overflow: auto;
            padding: 10px;
        }

        #sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            display: block;
        }

        #sidebar a:hover {
            background-color: #555;
        }

        .navbar {
            background-color: #333;
            height: 80px;
            color: #fff;
            overflow: hidden;
        }

        .navbar a {
            float: right;
            display: block;
            color: #fff;
            text-align: center;
            justify-content: center;
            align-items: center;

            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 260px;
            margin-top: 50px;
            padding: 20px;
        }

        .content image {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));

            grid-gap: 20px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relative;

            width: 100%;
        }

        .box {
            width: 200px;
            height: 250px;
            background-color: black;
            color: black;
            text-align: center;
            margin: 10px;

            font-size: 20px;
            font-weight: bold;
            display: inline-block;
        }

        .box img {
            max-width: 100%;
            max-height: 100%;
            width: 100%;
            height: 100%;
        }




        .box p {
            margin-top: 10px;
        }

        .image-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));

            grid-gap: 20px;
        }
    </style>

</head>

<body>
    <div id="sidebar">
        <h2>Dashboard</h2>
        <a href="#">Home</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="category.php">category</a>
        <a href="product.php">Product</a>
        <!-- Add more links as needed -->
    </div>
    <div class="navbar">
        <a href="#">Contact</a>
        <a href="#">About</a>
        <a href="#">Services</a>
    </div>
    <div class="content">
        <?php
        // Sample PHP code to display dynamic content
        echo "<h2>Welcome to Mahi's Dashboard</h2>";
        echo "<p>This is the simple collection of Mahi's image generated with PHP.</p>";

        //$images=["dhoni2.jpeg","dhoni3.jpeg","dhoni4.jpeg","dhoni5.jpeg","dhoni6.jpeg"];
        //var_dump($images);
        
        //for ($i = 1; $i <= 6; $i++) {
        //echo '<div class="box">Box ' . $i . '</div>';
        //}
        
        /*for ($i = 0; $i < count($images); $i++) {
            echo '<div class="box">';
            echo '<img src="' . $images[$i] . '" alt="Image ' . ($i + 1) . '">';
            echo '<p>Box ' . ($i + 1) . 'Mahi1</p>';
            echo '</div>';
        }*/



        $imageDescriptions = [
            ["image" => "dhoni2.jpeg", "description" => "Mahi walking "],
            ["image" => "dhoni3.jpeg", "description" => "Mahi batting"],
            ["image" => "dhoni4.jpeg", "description" => "Mahi review"],
            ["image" => "dhoni5.jpeg", "description" => "Mahi watching"],
            ["image" => "dhoni6.jpeg", "description" => "Mahi smiling"]

        ];

        for ($i = 0; $i < count($imageDescriptions); $i++) {
            echo '<div class="box">';
            echo '<img src="' . $imageDescriptions[$i]["image"] . '" alt="Image ' . ($i + 1) . '">';
            echo '<p class="image-description">' . $imageDescriptions[$i]["description"] . '</p>'; // for Displaying image description
            echo '</div>';
        }


        ?>
    </div>
    </br>
    </br>
    <div class="image-container">

        <?php

        $conn = new mysqli("localhost", "root", "", "photo");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve image data
        $sql = "SELECT id, filename, description FROM db_photo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                /*echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                //echo '<td>' . $row["filename"] . '</td>';
                echo '<td style="height: 200px; width: 400px; text-align: center"><img src="' . $row["filename"] . '" alt="Image"></td>';
                echo '<td>' . $row["description"] . '</td>';
                echo '</tr>';
                */

                /*


                echo '<div class="image-box">';
                //echo '<a href="' . $row["filename"] . '" target="_blank">'; // Make the image a clickable link
                echo '<img style="height: 200px; width: 200px;" src="' . $row["filename"] . '" alt="Image">';

                //echo '<a href="image_display.php?filename=' . urlencode($row["filename"]) . '" target="_blank">';
                echo '<a href="image_display.php?filename=' . urlencode($row["filename"]) . '&id=' . urlencode($row["id"]) . '&description=' . urlencode($row["description"]) . '" target="_blank">';






                echo '<p class="image-description">' . $row["description"] . '</p>';
                echo '</a>';
                echo '</div>';

                */

                /*
                echo '<div class="image-box">';
                echo '<a href="image_display.php?filename=' . urlencode($row["filename"]) . '&id=' . urlencode($row["id"]) . '&description=' . urlencode($row["description"]) . '" target="_blank">';
                echo '<img style="height: 200px; width: 200px;" src="' . $row["filename"] . '" alt="Image">';
                echo '<p class="image-description">' . $row["description"] . '</p>';
                echo '</a>';
                echo '</div>';

                */
                echo '<div class="image-box">';
                
                
                //echo '<a href="image_display.php">';
                echo '<a href="image_display.php?id=' . urlencode($row["id"]) . '">';
                echo '<img style="height: 200px; width: 200px;" src="' . $row["filename"] . '" alt="Image">';
                echo '<p class="image-description">' . $row["description"] . '</p>';
                echo '</a>';
                echo '</div>';
                









            }
        } else {
            echo '<tr><td colspan="3">No images found in the database.</td></tr>';
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>




    <div class="footer">
        &copy; 2023 Arivuu.com . All rights reserved.
    </div>



</body>



</html>