<?php
	
$conn = new mysqli("localhost","root","","foresedb");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . $conn->connect_error();
  exit();
}



?>