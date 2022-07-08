<?php
$servername = "mysql-sistemcomer.alwaysdata.net";
$dbname = "sistemacomer_riego";
$username = "274093_riego";
$password = "americanCLASSIC29*";
$api_key_value ="tPmAT5Ab3j7F9";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>