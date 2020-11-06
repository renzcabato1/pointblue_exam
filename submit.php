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
$begin = new DateTime( $_POST['date_from'] );
$end = new DateTime( $_POST['date_to'] );
$count_leave = 0;
for($i =$begin ; $i <=$end ; $i->modify('+1 day')){
	
	$data = $i->format("N");
	if(($data == "6") || ($data == "7"))
	{
		
	}
	else
	{
		if($_POST['leave_type'] === "Whole Day")
		{
			$count_leave = $count_leave + 1;
		}
		else
		{
			$count_leave = $count_leave + .5;
		}
	}
}
$date_today = date('Y-m-d');
$sql = "INSERT INTO file_leave (leave_type, date_from, date_to,date_filed,remarks,leave_count) VALUES ('".$_POST['leave_type']."', '".$_POST['date_from']."', '".$_POST['date_to']."', '".$date_today."','".$_POST['remarks']."','".$count_leave."')";


if ($conn->query($sql) === TRUE) {
	
echo json_encode($_POST);
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






?>