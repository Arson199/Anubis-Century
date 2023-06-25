<?php 
	include_once 'connection.php';
	session_start();
	// if (isset($_GET['visit'])) {
	// 		$_SESSION['visit'] = '0';	
	// 	if (!$_SESSION['visit'] = '0') {
	// 		header('location:ad.php');
	// 	}
	// }
	// if (!$_SESSION['visit'] = '0') {
	// 		header('location:ad.php');
	// 	}
	if (!isset($_GET['visit'])) {
		session_destroy();
		header('location:ad.php');
	}

// Fetch the visitor data from the database
$sql = "SELECT * FROM visitors";
$result = $conn->query($sql);

// Close the database connection
$conn->close();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Visitors-details</title>
 	<link rel="icon" type="image" href="images/trasparent black.png">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-1"></div>
 			<div class="col-md-10">
 				<h1 class="text-md-center mt-5 mb-3">Visitors Information
 					<a href="dash.php" class="btn btn-primary float-end mt-md-2 mt-0">BACK</a>
 				</h1>

 				<!-- <div class="table-responsive"> -->
			 		<table class="table text-center">
					  <thead class="table-dark">
					    <tr>
					    	<th>id</th>
				            <th>IP Address</th>
				            <th>Device Type</th>
				            <th>OS Type</th>
			        	</tr>
					  </thead>
					  <tbody>
					  	<?php while($row = $result->fetch_assoc()): ?>
						    <tr>
						    	<td><?php echo $row['id']; ?></td>
					            <td><?php echo $row['ip_address']; ?></td>
					            <td><?php echo $row['device_type']; ?></td>
					            <td><?php echo $row['os_type']; ?></td>
				        	</tr>
			        	<?php endwhile; ?>
					  </tbody>
					</table>
				<!-- </div> -->
 			</div>
 			<div class="col-md-1"></div>
 		</div>
 	</div>
		

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 </body>
 </html>