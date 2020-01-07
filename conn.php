<?php 


$conn = mysqli_connect("localhost","root","","foresedb");
$id ='';
 $hrname = '';
 $company = '';
 $phno = '';
 $emailid = '';
 $address = '';
 $status = '';
 $dates = '';


if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$hrname = $_POST['hrname'];
	$company = $_POST['company'];
	$phno = $_POST['phno'];
	$emailid = $_POST['emailid'];
	$address = $_POST['address'];
	$status = $_POST['status'];
	$dates = $_POST['dates'];
	
	
	$query = "INSERT INTO `contacts` (`username`,`hrname`, `company`, `phno`, `emailid`, `address`, `status`, `dates`) VALUES ('$username', '$hrname', '$company', '$phno', '$emailid', '$address', '$status', '$dates')";
	$query_run = mysqli_query($conn, $query);


	if ($query_run) {
		header('Location: home.php');
		echo '<script> alert("HR data saved "); </script>' ;
			}
	else{
		echo '<script> alert("HR contact already Exists in the DataBase, Please check the phone number or Email ID. Please go back"); </script>';

	}
}


if (isset($_POST['updatedata'])) {

	$id = $_POST['update_id'];
	$hrname = $_POST['hrname'];
	$company = $_POST['company'];
	$phno = $_POST['phno'];
	$emailid = $_POST['emailid'];
	$address = $_POST['address'];
	$status = $_POST['status'];
	$dates = $_POST['dates'];
	
	
	$query= "UPDATE contacts SET hrname='$hrname',company='$company',phno='$phno',emailid='$emailid',address='$address',status='$status',dates='$dates' WHERE id='$id' ";
	$query_run = mysqli_query($conn, $query);


	if ($query_run) {
		echo '<script> alert("Data Updated"); </script>';
		header('Location: home.php');
	}
	else{
		echo '<script> alert("Data not updated"); </script>';
	}
}


/*if (isset($_POST['deletedata'])) {
	
	$id = $_POST['delete_id'];

	$query = "DELETE FROM `contacts` WHERE id = `$id`";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		echo '<script> alert("HR contact deleted!"); </script>';
		header("Location: home.php");
	}
	else {
		echo '<script> alert("contact not deleted!")</script>';
	}



} */

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$conn->query("DELETE FROM contacts WHERE id=$id");
	header("location: home.php");
}


/*if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$result = $conn->query("SELECT * FROM contacts WHERE id=$id") or die($conn->error());
	
		$row = $result->fetch_array();
		$hrname = $row['hrname'];
		$company = $row['company'];
		$phno = $row['phno'];
		$emailid = $row['emailid'];
		$address = $row['address'];
		$status = $row['status'];
		$dates = $row['dates'];
	
} */

?>