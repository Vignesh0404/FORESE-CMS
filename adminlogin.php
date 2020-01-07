<?php 
if (isset($_POST['submit'])) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "foresedb";

	session_start();
	$conn = new mysqli($servername,$username,$password,$dbname);

	if ($conn->connect_error) {
		die("connection failed". $conn->connect_error);
	}

	$sql ="SELECT * FROM admins";
	$result = $conn->query($sql);

	$user = $_POST["user"];
	$pass = $_POST["pass"];

	if ($result->num_rows > 0) {
		$found = FALSE;
		while ($row = $result->fetch_assoc()) {
			if ($user == $row["uname"]) {
				$found = TRUE;
				if ($pass == $row["password"]) {
					$_SESSION["user"] = $row["uname"];
					header("Location:adminview.php");
					exit();
				}
				else {
					echo "\n<center><b><h3>Incorrect Password</b></h3></center>";
				}
			}
		}	
			if ($found == FALSE) {
				echo "\n<center>Invalid User, Try again</center>";
			}
		}
		else {
			echo "0 results";
		}
		$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE-DB | Admin Sign In</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		
	</style>

</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 form-div login">
					<form action="adminlogin.php" method="POST">
						
						<h1 class="text-center"><font face="Poppins" size="7"><b>Login Here</b></font></h1>
					</br>

						

						<div class="form-group">
							<label for="username">Admin Name</label>
							<input type="text" name="user" class="form-control form-control-lg">
						</div>


						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="pass" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Login</button>
						</div>
						<p><center>Contact your administartor, if any problem with 
						login exist</center></p>
						<p class="text-center"><a href="forgotpass.php">Forgot Password?</a></p>
						
								<p class="text-white text-center mt-2"><font color="black">Came here by mistake?</font><br><a href="signin.php">Click here to go to user login</a></p>
							
						

					</form>
				</div>
			</div>
		</div>
</body>
</html>