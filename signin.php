<?php require_once 'authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE-DB | Sign In</title>

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
					<form action="signin.php" method="POST">
						
						<h1 class="text-center"><font face="Poppins" size="7"><b>Login Here</b></font></h1>
					</br>

						<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
							<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div> 
						<?php endif; ?>

						<div class="form-group">
							<label for="username">Email/Username</label>
							<input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
						</div>


						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
						</div>
						<p class="text-center"><a href="forgotpass.php">Forgot Password?</a></p>
						<p class="text-center">New to Database?<a href="signup.php">  Register Now</a>
								<p class="text-white text-center mt-2"><font color="black">Looking for Moderator Login?</font><br><a href="adminlogin.php">Click here!</a></p>
							
						

					</form>
				</div>
			</div>
		</div>
</body>
</html>