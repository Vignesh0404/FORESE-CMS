<?php require_once 'authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE-DB | Sign Up</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 form-div">
					<form action="signup.php" method="POST">
						
						<h1 class="text-center"><font face="Poppins" size="7"><b>Register Here</b></font></h1>
					</br>

						<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
							<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div> 
						<?php endif; ?>
						
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
						</div>


						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<label for="confirmpassword">Confirm Password</label>
							<input type="password" name="confirmpassword" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
						</div>

						<p class="text-center">Already a Member?<a href="signin.php">  Sign In</a></p>

					</form>
				</div>
			</div>
		</div>
</body>
</html>