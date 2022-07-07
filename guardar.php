<?php
$servername = "localhost";
$dbname = "id18352758_cacao";
$username = "id18352758_sensor";
$password = "m7ZLf{Jxosdzoo*@";
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