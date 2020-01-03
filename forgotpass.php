<?php require_once 'authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE-DB | Forgot password</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 form-div login">
					<form action="forgotpass.php" method="POST">
						
						<h1 class="text-center"><font face="Poppins" size="7"><b>Recover your password</b></font></h1>
					</br>
					<p>
						Please enter your email address you used to sign up on this site
						 and we will assit you in recovering your password.
					</p>

						<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
							<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div> 
						<?php endif; ?>

						<div class="form-group">
							
							<input type="text" name="email" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<button type="submit" name="forgotpass-btn" class="btn btn-primary btn-block btn-lg">Recover Password</button>
						</div>
						<p class="text-center">By mistake?<a href="signup.php"> Sign in</a>
						
					</form>
				</div>
			</div>
		</div>
</body>
</html>