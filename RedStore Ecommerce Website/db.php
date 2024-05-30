<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projectweb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Perform a simple query
// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // Output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
//     }
// } else {
//     echo "No results found.";
// }

// // Close connection
// mysqli_close($conn);
?>