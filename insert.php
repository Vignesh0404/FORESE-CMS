<?php 

$conn = mysqli_connect("localhost","root","","foresedb");

if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}


if (isset($_POST['submit'])) {

	$hrname = $_POST['hrname'];
	$company = $_POST['company'];
	$phno = $_POST['phno'];
	$emailid = $_POST['emailid'];
	$address = $_POST['address'];
	$status = $_POST['status'];
	$dates = $_POST['dates'];
	
	$query = "INSERT INTO contacts ('hrname', 'company', 'phno' ,'emailid' 'address', 'status', 'dates') VALUES ('$hrname', '$company', '$phno' ,'$emailid' '$address', '$status', '$dates')";
	$query_run = mysqli_query($conn, $query);


	if ($query_run) {
		echo '<script> alert("HR data saved"); </script>';
		header('Location: home.php');
	}
	else{
		echo '<script> alert("HR data not saved "); </script>';
	}
}





?>