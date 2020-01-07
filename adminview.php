<?php 
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "foresedb";

	session_start();
	$conn = new mysqli($servername,$username,$password,$dbname);


	if ($conn->connect_error) {
		die("connection failed". $conn->connect_error);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>FORESE DB | Admin View</title>
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
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-material-amber">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a href="#" class="luxbar-brand">FORESE-CMS</a>
                <label class="luxbar-hamburger luxbar-hamburger-doublespin" 
                id="luxbar-hamburger" for="luxbar-checkbox"> <span></span> </label>
            </li>
            <li class="luxbar-item"><a href="#">Notification</a></li>
            <li class="luxbar-item"><a href="#">View Stats</a></li>
            <li class="luxbar-item"><a href="#">Log Out</a></li>
        </ul>
    </div>
</header>

<div id="body">

	</br>
	</br>
	</br>

			<h3 class="text-primary"> Welcome, Admin</h3>
			 <hr style="border-top:1px dotted #ccc;"/>
 			<br/>


				<div class="container" style="width:900px; right: 0px;">
                <h2 align="center">HR CONTACT MANAGMENT SYSTEM</h2>
                <h6 align="center">Contains all the contacts in the database</h6><br />


                <?php		 
		         $display = "SELECT * FROM `contacts`";
		         $display_run = mysqli_query($conn,$display);
		         ?>


 			<table id = "datatable" class="table table-bordered table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">HR-Name</th>
		      <th scope="col">HR-Company</th>
		      <th scope="col">PhoneNum</th>
		      <th scope="col">Handle</th>
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
		      <td><?php echo $row['username']; ?></td>

		    </tr>
		    
		  </tbody>
		  <?php				
		      	}
		         } 
		   ?>
		</table>

		<!-- ADD CONTACT SECTION -->
		<div class="container">
                	 
         <div class="card-body">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#hrdetailmodal" style="position: fixed; right: 100px;top: 200px; color: black;">
		<i class="fas fa-user-plus"></i> Add Contact
		</button>
         </div>	
         </div>


         		
	<!-- END OF ADD CONTACT SECTION -->

</div>


 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


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
</body>
</html>