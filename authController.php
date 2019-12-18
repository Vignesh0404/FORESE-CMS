<?php 
require 'mailController.php';
require_once 'database.php';
session_start();
$errors = [];
$username = "";
$email = "";

if (isset($_POST['signup-btn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];

	if (empty($username)) {
	 	$errors['username'] = "Username Required";
	 } 


	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 	$errors['email'] = "Email address is invalid";
	 }

	 if (empty($email)) {
	 	$errors['email'] = "Email Required";
	 } 


	 if (empty($password)) {
	 	$errors['password'] = "Password Required";
	 } 

	 if ($password !== $confirmpassword) {
	 	$errors['password'] = "The passwords do not match";
	 }

	 // for email verification
	 $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1"; 
	 $stmt = $conn->prepare($emailQuery);
	 $stmt->bind_param('s', $email);
	 $stmt->execute();
	 $result = $stmt->get_result();
	 $userCount = $result->num_rows;
	 $stmt->close();

	 if ($userCount > 0) {
	 	$errors['email'] = "Email already exists"; 
	 }


	 if (count($errors) == 0) {
	 	$password = password_hash($password, PASSWORD_DEFAULT);
	 	$token = bin2hex(random_bytes(50));
	 	$verified = false;

	 	$sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?,?,?,?,?)";
	 	$stmt = $conn->prepare($sql);
		 $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);
		 
		 if ($stmt->execute()) {
		 	$user_id = $conn->insert_vid;
		 	$_SESSION['vid'] = $user_vid;
		 	$_SESSION['username'] = $username;
		 	$_SESSION['email'] = $email;
		 	$_SESSION['verified'] = $verified;

sendVerificationEmail($email, $token,$username);

		 	$_SESSION['alert-class'] = "alert-success";
		 	header('location: home.php');
		 	exit();
		 } 
		 else {
		 	$errors['db_error'] = "database error: Failed to register";
		 }
		 
	 }
}



//login page controller 

if (isset($_POST['login-btn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	if (empty($username)) {
	 	$errors['username'] = "Username Required";
	 } 

	 if (empty($password)) {
	 	$errors['password'] = "Password Required";
	 } 

	if (count($errors) ===0 ) {
		# code...
		 $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
	 $stmt = $conn->prepare($sql);
	 $stmt -> bind_param('ss',$username, $username);
	 $stmt->execute();
	 $result = $stmt->get_result();
	 $user = $result->fetch_assoc();

	 if (password_verify($password, $user['password'])) {

		 	$_SESSION['vid'] = $user[vid];
		 	$_SESSION['username'] = $user['username'];
		 	$_SESSION['email'] = $user['email'];
		 	$_SESSION['verified'] = $user['verified'];

		 	$_SESSION['alert-class'] = "alert-success";
		 	header('location: home.php');
		 	exit();
	 	
	 }
	 else {
	 	$errors['login_fail'] = "Wrong Credentials";
	 }
	}
 } 

 //logout
 if (isset($_GET['logout'])) {
 	# code...
 	session_destroy();
 	unset($_SESSION['vid']);
 	unset($_SESSION['username']);
 	unset($_SESSION['email']);
 	unset($_SESSION['verified']);
 	header('location: signin.php');
 	exit();
 }
