<?php 
	session_start();
	include_once 'connection.php';
	// echo session_id();
	if (!isset($_SESSION['user_array'])) {	
		header('location:ad.php');
	}
	
	//Logout
	if (isset($_POST['logoutButton'])) {
		session_destroy();
		header("location:ad.php");
	}
	//select all user record
	$query = "select * from form";
	$result = mysqli_query($conn,$query);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<style>
		body{
			padding: 50px;
		}
		a{
			color: white;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-success">
						<div class="row">
							<div class="col-md-6">
								<div class="card-title">
									<a href="#"><h5>Admin Dashboard</h5></a>
								</div>
							</div>
							<div class="col-md-6 text-center">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
									<button type="submit" name="logoutButton" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are u sure u want to logout?'); ">Logout</button>
								</form>				
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<h6>Admin Info</h6>
										<div>
											Image : 
											<img src="images/<?php echo $_SESSION['user_array']['image'];?>" style="width: 80px; height: 80px; border-radius: 50%;">
										</div>
										<div>
											Name : <?php echo $_SESSION['user_array']['name']; ?>
										</div>
										<div>
											Email : <?php echo $_SESSION['user_array']['email']; ?>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-md-8">
								<h5>User List</h5>
						<table class="table table-bordered table-hover table-dark-">
							<thead>
							    <tr>
							      <th>ID</th>
							      <th>Name</th>
							      <th>Email</th>
							      <th>Address</th>
							      <th>Created At</th>
							    </tr>
							 </thead>		
							<?php 
							foreach ($result as $user) { ?>
								<tbody>
								<td><?php echo $user['id']; ?></td>
								<td><?php echo $user['twitter']; ?></td>
								<td><?php echo $user['discord']; ?></td>
								<td><?php echo $user['walletaddress']; ?></td>
								<td><?php echo $user['created_at']; ?></td>
								<td>
									<a href="Edit" class="btn btn-primary btn-sm">Edit</a>
									<a href="Delete" class="btn btn-danger btn-sm">Delete</a>
								</td>
								
								</tbody>
								<?php } ?>
						</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>