<?php
// Get the query parameters from the URL
$location = $_GET['location'];
$priceRange = $_GET['price'];
$bedrooms = $_GET['bedrooms'];

// Connect to your database (replace with your own database details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "houseprices";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the data from the database based on the query parameters
if ($location == "all" && $priceRange != "all" && $bedrooms != "all") {
    $sql = "SELECT * FROM `data` WHERE `price` BETWEEN 0 AND $priceRange AND `bedrooms`='$bedrooms' ORDER BY `price` ASC";
} elseif ($location != "all" && $priceRange == "all" && $bedrooms != "all") {
    $sql = "SELECT * FROM `data` WHERE `location`='$location' AND `bedrooms`='$bedrooms'ORDER BY `price` ASC";
} elseif ($location != "all" && $priceRange != "all" && $bedrooms == "all") {
    $sql = "SELECT * FROM `data` WHERE `location`='$location' AND `price` BETWEEN 0 AND $priceRange ORDER BY `price` ASC";
} elseif ($location == "all" && $priceRange == "all" && $bedrooms != "all") {
    $sql = "SELECT * FROM `data` WHERE `bedrooms`='$bedrooms' ORDER BY `price` ASC";
} elseif ($location == "all" && $priceRange != "all" && $bedrooms == "all") {
    $sql = "SELECT * FROM `data` WHERE `price` BETWEEN 0 AND $priceRange ORDER BY `price` ASC";
} elseif ($location != "all" && $priceRange == "all" && $bedrooms == "all") {
    $sql = "SELECT * FROM `data` WHERE `location`='$location'ORDER BY `price` ASC";
} elseif ($location=="all" && $priceRange=="all" && $bedrooms=="all")
    { $sql = "SELECT * from `data` ORDER BY `price` ASC";
} else { 
    $sql = "SELECT * FROM `data` WHERE  `price` BETWEEN 0 AND $priceRange AND `location`='$location' AND `bedrooms`='$bedrooms' ORDER BY `price` ASC";}

$result = $conn->query($sql);

// Display the data on the webpage
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Location</th><th>Price</th><th>Bedrooms</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['bedrooms'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Price Analysis Results</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
</body>
</html>
