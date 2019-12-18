<?php 
	require_once 'authController.php';
     require_once 'mailcontroller.php';
      

    if (isset($_get['token'])) {
        $token = $_GET['token'];
        verifyuser($token);
    }

    if (!isset($_SESSION['vid'])) {
        header('location: signin.php');
        exit();
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>FORESE DB | HOME</title>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>
	<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
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
            
            <li class="luxbar-item"><a href="faq.html">My Account</a></li>
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
                <h6 align="center">Click the button to 'add in new a new contact'</h6><br />
					

					<!-- Modal -->
					

					<div class="modal fade" id="hrdetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="hrdetailmodal">Please fill in the details listed below!</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					      <form action="insert.php" method="POST">
					      <div class="modal-body">
					        
							  <div class="form-group">
							    <label>Name</label>
							    <input type="text" class="form-control" name="hrname">
							  </div>
							  
							  <div class="form-group">
							    <label>Company</label>
							    <input type="text" class="form-control" name="company">
							  </div>

							  <div class="form-group">
							    <label>Email</label>
							    <input type="email" class="form-control" name="emailid">
							  </div>

							  <div class="form-group">
							    <label>Ph-Num</label>
							    <input type="number" class="form-control" name="phno">
							  </div>

							  <div class="form-group">
							    <label>Address</label>
							    <input type="text" class="form-control" name="address">
							  </div>

							  <div class="form-group">
							    <label>Status</label>
							    <input type="text" class="form-control" name="status" >
							  </div>

							  <div class="form-group">
							    <label>Dates</label>
							    <input type="number" class="form-control" name="dates" >
							  </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					        <button type="submit" name="submit" class="btn btn-success">Save changes</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>
                	

                	<div class="container">
                		<div class="card-body">
                			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#hrdetailmodal" style="position: absolute; right: 730px;top: 290px; color: black;">
							  <i class="fas fa-user-plus"></i>
							</button>
                			
                		</div>
                	</div>





                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
           
</body>
</html>