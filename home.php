<?php 
	include 'conn.php';
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
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	
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
            
            <li class="luxbar-item"><a href="account.php">My Account</a></li>
            <li class="luxbar-item"><a href="home.php?logout=1">Sign Out</a></li>
        </ul>
    </div>
</header>
		<div id="body">
			</br>
			</br>
		</br>
			
			<?php $uname = $_SESSION['username']; ?>
			<h3 class="text-primary"> Welcome, <?php echo $uname; ?></h3>
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
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <center>
 				You need to verify your account.
 				Sign in to your email account and click on
 				the verification link at
 				 <strong><?php echo $_SESSION['email']; ?></strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <?php endif; ?>

            <?php if ($_SESSION['verified']): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <center>
 				
 				 <strong>You're Verified</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <?php endif; ?>

            


            


 			<br/>
           <div class="container" style="width:900px; right: 0px;">
                <h2 align="center">HR CONTACT MANAGMENT SYSTEM</h2>
                <h6 align="center">Click the button to 'add in a new contact'</h6><br />
					

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

					      <form action="conn.php" method="POST">
					      <div class="modal-body">
					        
							  <div class="form-group">
							    <label>Name</label>
							    <input type="text" class="form-control" name="hrname" value="<?php echo $hrname; ?>" placeholder="Enter the HR Name">
							  </div>
							  <input type="hidden" class="form-control" name="username" value=<?php echo $uname; ?>>							  
							  <div class="form-group">
							    <label>Company</label>
							    <input type="text" class="form-control" name="company" value="<?php echo $company; ?>" placeholder="Enter the HR's Company">
							  </div>

							  <div class="form-group">
							    <label>Email</label>
							    <input type="email" class="form-control" name="emailid" value="<?php echo $emailid; ?>" placeholder="Enter the HR's Email">
							  </div>

							  <div class="form-group">
							    <label>Ph-Num</label>
							    <input type="number" class="form-control" name="phno" value="<?php echo $phno; ?>" placeholder="Enter the phone number of the HR">
							  </div>

							  <div class="form-group">
							    <label>Address</label>
							    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Enter the Address">
							  </div>
							  <div class="form-group">
							  	<label>Status</label>
							  <select class="form-control" name="status" value="<?php echo $status; ?>" type="text">
							  	
							  <option>Called/Accepted</option>
							  <option>Called/Declined</option>
							  <option>Called/Emailed</option>
							  <option>Called/YetToMail</option>
							  <option>NotCalled</option>
							  <option>Called/SwitchedOff</option>
							  <option>Called/NotReacheable</option>
							  <option>Others</option>
								</select>
								</div>

							  

							  <div class="form-group">
							    <label>Dates</label>
							    <input type="number" class="form-control" name="dates" value="<?php echo $dates; ?>" placeholder="Enter the num of dates" >
							  </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					        <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>


			<!-- ######################################################################################################-->

				 <!--EDIT -->  

				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="hrdetailmodal">Edit Hr details</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					      <form action="conn.php" method="POST">
					      <div class="modal-body">
					        <input type="hidden" name="update_id" value="<?php echo $id; ?>" id="update_id">
							  <div class="form-group">
							    <label>Name</label>
							    <input type="text" class="form-control" name="hrname" id="hrname" placeholder="Enter the HR Name">
							  </div>
							  
							  <div class="form-group">
							    <label>Company</label>
							    <input type="text" class="form-control" name="company" id="company" placeholder="Enter the HR's Company">
							  </div>

							  <div class="form-group">
							    <label>Email</label>
							    <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter the HR's Email">
							  </div>

							  <div class="form-group">
							    <label>Ph-Num</label>
							    <input type="number" class="form-control" name="phno" id="phno" placeholder="Enter the phone number of the HR">
							  </div>

							  <div class="form-group">
							    <label>Address</label>
							    <input type="text" class="form-control" name="address" id="address" placeholder="Enter the Address">
							  </div>

							  <div class="form-group">
							  	<label>Status</label>
							  <select class="form-control" name="status" id="status" type="text">
							  	
							  <option>Called/Accepted</option>
							  <option>Called/Declined</option>
							  <option>Called/Emailed</option>
							  <option>Called/YetToMail</option>
							  <option>NotCalled</option>
							  <option>Called/SwitchedOff</option>
							  <option>Called/NotReacheable</option>
							  <option>Others</option>
								</select>

								</div>

							  <div class="form-group">
							    <label>Dates</label>
							    <input type="number" class="form-control" name="dates" id="dates" placeholder="Enter the num of dates" >
							  </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					        <button type="submit" name="updatedata" class="btn btn-primary">Save changes</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div> 


			<!-- ######################################################################################################-->





			<!-- ######################################################################################################-->

				<!-- DELETE  

				<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="hrdetailmodal">Delete Hr contact</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					      <form action="conn.php" method="POST">
					      <div class="modal-body">
					        <input type="hidden" name="delete_id" id="delete_id">
						    <h4><font face="Poppins">Do you want to delete this contact?</font></h4>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
					        <button type="submit" name="deletedata" class="btn btn-dark">Yes</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div> -->


			<!-- ######################################################################################################-->
                	

                	
                			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#hrdetailmodal" style="position: fixed; right: 65px;top: 250px; color: black;">
							  <i class="fas fa-user-plus"></i> Add Contact
							</button>
                		</div>	
                	</div>


                	
                		
                		<div class="card-body" >
                			

                					
                			
                			 <?php
                			 
		                			$display = "SELECT * FROM `contacts` WHERE `username` = '$uname'";
		                			$display_run = mysqli_query($conn,$display);

		                			

		                	?>



                			<div class="table-responsive">
                			<table id="datatable" class="table table-bordered">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Company</th>
						      <th scope="col">PhNum</th>
						      <th scope="col">Email ID</th>
						      <th scope="col">Address</th>
						      <th scope="col">Status</th>
						      <th scope="col">Dates</th>
						      <th scope="col">EDIT</th>
						      <th scope="col">DELETE</th>

						    </tr>
						  </thead>

						  <?php

		                			if ($display_run) {
		                				foreach ($display_run as $row) {
		                	?>	
						  <tbody>
						    <tr>
						      <td><?php echo $row['id']; ?></td>
						      <td><?php echo $row['hrname']; ?></td>
						      <td><?php echo $row['company']; ?></td>
						      <td><?php echo $row['phno']; ?></td>
						      <td><?php echo $row['emailid']; ?></td>
						      <td><?php echo $row['address']; ?></td>
						      <td><?php echo $row['status']; ?></td>
						      <td><?php echo $row['dates']; ?></td>
						      <td><button type="button" class="btn btn-success editbtn">EDIT</a></button></td>
						      <td><button type="button" class="btn btn-danger deletebtn" onclick="window.location.href='home.php?delete=<?php echo $row['id']; ?>'">DELETE</button></td>
						    </tr>
						  </tbody>
						  <?php				
		                				}
		                			}

		                			else 
		                			{ 
		                				echo "No Record Found!";
		                			}
                			 ?>
						</table>
					</div>

                
                	




                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
				<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


				<!-- table filter-->

				<script>
					$(document).ready(function() {
				    $('#datatable').DataTable({
				    	"pagingType": "full_numbers",
				    	"lengthMenu": [
				    	[10, 25, 50, -1],
				    	[10, 25, 50, "All"]
				    	],
				    	responsive: true,
				    	language: {
				    		search:"_INPUT_",
				    		searchPlaceholder: "Search Records",
				    	}
				    });
					} );
				</script>
				
				<script>
					$(document).ready(function(){
						$('.deletebtn').on('click', function(){
							$('#deletemodal').modal('show');

							$tr = $(this).closest('tr');

							var data = $tr.children("td").map(function() {
								return $(this).text();
							}).get();

							console.log(data);
							$('#delete_id').val(data[0]);
							
							
						});

					});
				</script>




				<script>
					$(document).ready(function(){
						$('.editbtn').on('click', function(){
							$('#editmodal').modal('show');

							$tr = $(this).closest('tr');

							var data = $tr.children("td").map(function() {
								return $(this).text();
							}).get();

							console.log(data);
							$('#update_id').val(data[0])
							$('#hrname').val(data[1]);
							$('#company').val(data[2]);
							$('#phno').val(data[3]);
							$('#emailid').val(data[4]);
							$('#address').val(data[5]);
							$('#status').val(data[6]);
							$('#dates').val(data[7]);
						});

					});
				</script>

				
           
</body>
</html>