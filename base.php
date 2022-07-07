<?php

$servername = "localhost";
$dbname = "id18352758_cacao";
$username = "id18352758_sensor";
$password = "m7ZLf{Jxosdzoo*@";
$api_key_value ="tPmAT5Ab3j7F9";

$api_key  = $id_sector= $humedadR= $temperatura= $humedadS= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $id_sector= test_input($_POST["id_sector"]);
        $humedadR = test_input($_POST["humedadR"]);
        $temperatura = test_input($_POST["temperatura"]);
        $humedadS= test_input($_POST["humedadS"]);
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO `lectura`(id_sector, humedadR,temperatura,humedadS)
        VALUES ('" . $id_sector . "',  '" . $humedadR . "',  '" . $temperatura . "',  '" . $humedadS . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}