<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "pointblue";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date_today = date('Y-m-d');
$sql = "SELECT * FROM file_leave";

$result = $conn->query($sql);
$emparray = array();
 while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
echo json_encode($emparray);






?>