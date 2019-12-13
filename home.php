<?php require_once 'authController.php';
    if (!isset($_SESSION['id'])) {
        header('location: signin.php');
        exit();
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE DB | HOME</title>
	<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header id="luxbar" class="luxbar-fixed">
    <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox"/>
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-material-bluegrey">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a href="#" class="luxbar-brand">FORESE-CMS</a>
                <label class="luxbar-hamburger luxbar-hamburger-spin" 
                id="luxbar-hamburger" for="luxbar-checkbox"> <span></span> </label>
            </li>
            <li class="luxbar-item"><a href="#">Home</a></li>
            <li class="luxbar-item"><a href="#">Notifications</a></li>
            <li class="luxbar-item"><a href="#">My Account</a></li>
            <li class="luxbar-item"><a href="home.php?logout=1">Sign Out</a></li>
        </ul>
    </div>
</header>
			</br>
			</br>
			</br>
			<h3 class="text-primary">Hello, <?php echo $_SESSION['username']; ?></h3>
			 <hr style="border-top:1px dotted #ccc;"/>
 			<br/>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['alert-class']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (!$_SESSION['verified']): ?>
 			<div class="alert alert-warning">
 			<center>
 				You need to verify your account.
 				Sign in to your email account and click on
 				the verification link at
 				 <strong><?php echo $_SESSION['email']; ?></strong>
 			</center>
 			</div>
            <?php endif; ?>
            <?php if($_SESSION['verified']): ?>
                <button class="btn btn-block btn-lg btn-primary">You're verified</button>
            <?php endif; ?>
 			<br/>
           <div class="container" style="width:900px;">
                <h2 align="center">HR CONTACT MANAGMENT SYSTEM</h2>
                <h3 align="center">Please fill in the details listed below</h3><br />


</body>
</html>