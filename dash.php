<?php
    session_start();
    require 'connection.php';

	// echo session_id();
	if (!isset($_SESSION['user_array'])) {	
		header('location:ad.php');
	}

	//Logout
	if (isset($_POST['logoutButton'])) {
		session_destroy();
		header("location:ad.php");
	}
	
		//Users ,Admins and Visitors Count
	    $que_admin = 'select count(id) AS admin_count from admin';
	    $que_form = 'select count(id) AS form_count from form';
	    $que_visitors = 'select count(ip_address) AS visitors_count from visitors';
	    $exe1 = mysqli_query($conn,$que_admin);
	    $exe2 = mysqli_query($conn,$que_form);
	    $exe3 = mysqli_query($conn,$que_visitors);
	    // if ($exe1) {
	    // 	$row = mysqli_fetch_assoc($exe1);
	    // 	$adminCount = $row['admin_count'];
	    // 	echo "<script>alert($adminCount)</script>";
	    // }else{
	    // 	echo "Error executing query: ".mysqli_error($conn);
	    // }
	    // if ($exe2) {
	    // 	$row = mysqli_fetch_assoc($exe2);
	    // 	$formCount = $row['form_count'];
	    // 	echo "<script>alert($formCount)</script>";
	    // }else{
	    // 	echo "Error executing query: ".mysqli_error($conn);
	    // }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="icon" type="image" href="images/trasparent black.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Iceberg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Creepster">
	<script src="https://kit.fontawesome.com/4ce7fdf274.js" crossorigin="anonymous"></script>
	<style>
		.font-creep{
			font-family: creepster;
			letter-spacing: 1px;
		}
		body{
			font-family: Iceberg;
			background: #91bad6;
		}
		a{
			text-decoration: none;
		}
		.sidebar{
			background: black;
			height: 100vh;
		}
		.search-input{
			background: transparent;
			border: none;
			border-radius: 0;
			border-bottom: 2px solid #999;
			transition: all .4s;
			color: white;
			font-size: 1.3em;
		}
		.search-input:focus{
			background: transparent;
			box-shadow: none;
			border-bottom: 2px solid #dc3545;
			color: white;
			font-size: 1.4em;
		}
		.search-button{
			background: #fff;
			border-radius: 50%;
			padding: 10px 16px;
			transition: all .4s;
		}
		.search-button:hover{
			background: #eee;
			transform: translateY(-1px);
		}
		.icon-parent{
			position: relative;
		}
		.icon-parent::after{
			content: "";
			position: absolute;
			top: 7px;
			left: 15px;
			height: 8px;
			width: 8px;
			border-radius: 50%;
			background: #f44336;
		}
		@media screen and (max-width: 992px){
			.sidebar{
				position: static;
				height: auto;
			}
			.top-navbar{
				position: static;
			}
		}
		.card-common{
			box-shadow:1px 2px 5px #999;
			transition: all .4s;
			cursor: pointer;
		}
		.card-common:hover{
			box-shadow:2px 3px 3px #999;
			transform:translateY(-8px);
/*			cursor: pointer;*/
		}
		.info{
			position: relative;
		}
		.title1{
			position: absolute;
			top: 11%;
		}
		.admin-info{
			position: relative;
		}
		.title2{
			position: absolute;
			top:25%;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
	  <div class="container-fluid">
	    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <div class="container-fluid">
	      	<div class="row">
	      		<div class="col-xl-2 col-lg-3  sidebar fixed-top" >
	      			<!-- for desktop screen -->
	      			<div class="py-3 info d-none d-md-block">
	      			<a href="index.html">
	      				<img class="ms-md-3 me-md-2" src="images/logo white bg transparent 2.png" style="width:60px;height: 60px;">
	      			</a>
	      			<a class="navbar-brand title1 text-white my-3 fs-3" href="index.html">Anubis Century</a>
	      			</div>
	      			<!-- for phone screen -->
	      			<div class="py-3 info ps-5 me-5 pe-5 d-md-none">
	      			<a href="index.html" class="me-2">
	      				<img class="" src="images/logo white bg transparent 2.png" style="width:60px;height: 60px;">
	      			</a>
	      			<a class="me-5 pe-5 navbar-brand title1 text-white my-3 fs-3" href="index.html">Anubis Century</a>
	      			</div>	
	      			<div class="border-bottom d-block"></div>
	      			<!-- for desktop screen  -->
	      			<div class="admin-info border-bottom py-3 px-md-4 d-md-block d-none">
	      				<img src="images/<?php echo $_SESSION['user_array']['image']; ?>" class="mx-md-3" style="width: 50px; height: 50px; border-radius:50%;" >
	      				<a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="font-creep text-white fs-3 title2"><?php echo $_SESSION['user_array']['name']; ?></a>
	      			</div>
	      			<!-- for phone screen -->
	      			<div class="admin-info py-3 text-center d-md-none pe-5 me-5">
	      				<img src="images/<?php echo $_SESSION['user_array']['image']; ?>" class="me-3" style="width: 50px; height: 50px; border-radius:50%;" >
	      				<a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="font-creep text-white fs-3 title2"><?php echo $_SESSION['user_array']['name']; ?></a>
	      			</div>
	      			<div class="border-bottom d-block"></div>
	      			<ul class="navbar-nav flex-column">
	      				<li class="nav-item my-md-2">
	      					<a href="<?php $_SERVER['PHP_SELF'] ?>" class="nav-link text-white text-center fs-4"><i class="fas fa-home me-2 text-primary"></i>Home</a>
	      				</li>
	      				<li class="nav-item">
	      					<a href="user-add.php" class="nav-link text-white text-center fs-4"><i class="fa-sharp fa-solid fa-user-plus me-2 text-warning"></i>Add Users</a>
	      				</li>
	      			</ul>
	      		</div>
	      		<div class="col-xl-10 col-lg-9 bg-dark fixed-top ms-auto top-navbar">
	      			<!-- <div class="row">
	      				<div class="col-md-3 py-md-3 mt-md-2 mt-3 text-center ">
	      					<a href="#" class="navbar-brand text-uppercase text-white fs-2">Admin Dashboard</a>
	      				</div>
	      				<div class="col-md-5 py-3">
	      				  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      					  <div class="input-group">
	      						<input type="text" class="me-2 form-control search-input" placeholder="Search..." name="searchData" required>
	      						<button type="submit" name="submitSearch" class="btn search-button"><i class="fas fa-search text-danger"></i></button>
	      					  </div>
	      				  </form>
	      				</div>
	      				<div class="col-md-4 py-3">
	      					<ul class="navbar-nav">
	      						<li class="nav-item icon-parent d-none d-md-block">
	      							<a href="#" class="nav-link icon-bullet"><i class="fa-solid fa-comments fa-lg"></i>
	      							</a>
	      						</li>
	      						<li class="nav-item icon-parent d-none d-md-block">
	      							<a href="#" class="nav-link icon-bullet"><i class="fa fa-bell fa-lg"></i>
	      							</a>
	      						</li>
	      						<li class="nav-item ms-md-auto d-md-block d-none" data-bs-toggle="modal" data-bs-target="#sign-out">
	      							<a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket fa-xl text-danger"></i>
	      							</a>
	      						</li>
	      						<li class="nav-item mx-auto d-md-none d-block " data-bs-toggle="modal" data-bs-target="#sign-out">
	      							<a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket fa-xl text-danger"></i>
	      							</a>
	      						</li>
	      					</ul>
	      				</div>
	      			</div> -->
	      			<div class="d-md-flex py-3 justify-content-around">
	      				<div class="px-5 mb-md-0 mb-2 pt-1 pt-md-0">
	      				  <a href="#" class="navbar-brand text-uppercase text-white fs-2">Admin Dashboard</a>
	      				</div>
	      				<div class="d-md-flex" style="width:100%;">
	      					<div class="w-50 d-md-block d-none">
	      					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      					  <div class="input-group">
	      						<input type="text" class="me-2 form-control search-input" placeholder="Search..." name="searchData" required>
	      						<button type="submit" name="submitSearch" class="btn search-button"><i class="fas fa-search text-danger"></i></button>
	      					  </div>
	      				  	</form>
	      				  	</div>
	      				  	<div class="w-100 d-block d-md-none">
	      					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      					  <div class="input-group">
	      						<input type="text" class="me-2 form-control search-input" placeholder="Search..." name="searchData" required>
	      						<button type="submit" name="submitSearch" class="btn search-button"><i class="fas fa-search text-danger"></i></button>
	      					  </div>
	      				  	</form>
	      				  	</div>
	      				  	<div class="mt-md-1 ms-md-4">
	      				  		<ul class="navbar-nav">
		      						<li class="nav-item icon-parent d-none d-md-block">
		      							<a href="#" class="nav-link icon-bullet"><i class="fa-solid fa-comments fa-lg"></i>
		      							</a>
		      						</li>
		      						<li class="nav-item icon-parent d-none d-md-block">
		      							<a href="#" class="nav-link icon-bullet"><i class="fa fa-bell fa-lg"></i>
		      							</a>
		      						</li>
	      						</ul>
	      					</div>
	      				  </div>
	      				    <ul class="navbar-nav">
	      						<li class="nav-item ms-md-auto d-md-block d-none" data-bs-toggle="modal" data-bs-target="#sign-out">
	      							<a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket fa-xl text-danger"></i>
	      							</a>
	      						</li>
	      						<li class="nav-item mx-auto d-md-none d-block " data-bs-toggle="modal" data-bs-target="#sign-out">
	      							<a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket fa-xl text-danger"></i>
	      							</a>
	      						</li>
	      					</ul>	 
	      			</div>
	      		</div>
	      	</div>
	      </div>
	    </div>
	  </div>
	</nav>

	<!-- modal dialog -->
	<div class="modal" id="sign-out">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Want to leave?</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					Press Logout to leave.
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" data-bs-dismiss="modal">Stay</button>
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
					<button type="submit" name="logoutButton" class="btn btn-danger">Logout</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- website statistics section -->
	<section id="statistics">
		<div class="row mt-lg-5">
			<div class="col-xl-10 col-lg-9 ms-auto">
				<div class="row mt-lg-5 mt-2 justify-content-center px-1">
					<div class="col-md-3 col-10">
						<div class="card card-common">		
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fa-solid fa-users fa-4x text-warning"></i>
								<div class="text-end text-secondary">
									<h5>Users</h5>
							<?php if ($exe2) {
	    						$row = mysqli_fetch_assoc($exe2);
	    						$formCount = $row['form_count']; 
	    					?>
									<h5><?php echo $formCount; ?></h5>
							<?php 
								}else{
	    							echo "Error executing query: ".mysqli_error($conn);
	    							} 
	    					?>
								</div>
								</div>
							</div>
							<div class="card-footer text-secondary text-size fs-3">
								<i class="fa-solid fa-rotate ps-2 pe-2"></i>
								<span>Update Now</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-10 mt-md-0 mt-3">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fa-solid fa-user-secret fa-4x text-danger"></i>
									<div class="text-end text-secondary">
										<h5>Admins</h5>
										<?php 
											if ($exe1) {
										    	$row = mysqli_fetch_assoc($exe1);
										    	$adminCount = $row['admin_count'];	
										 ?>
											<h5><?php echo $adminCount; ?></h5>
										<?php 
											}else{
	    									echo "Error executing query: ".mysqli_error($conn);
	    									} 
	    								?>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary text-size fs-3">
								<i class="fa-solid fa-rotate ps-2 pe-2"></i>
								<span>Update Now</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-10 mt-md-0 mt-3">
						<a href="visitors-detail.php?visit=true">
						<div class="card card-common">
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<i class="fa-solid fa-glasses fa-4x text-info"></i>
									<div class="text-end text-secondary">
										<h5>Visitors</h5>
										<?php 
											if ($exe3) {
										    	$row = mysqli_fetch_assoc($exe3);
										    	$visitorsCount = $row['visitors_count'];	
										 ?>
											<h5><?php echo $visitorsCount; ?></h5>
										<?php 
											}else{
	    									echo "Error executing query: ".mysqli_error($conn);
	    									} 
	    								?>
									</div>
								</div>
							</div>
							<div class="card-footer text-secondary text-size fs-3">
								<i class="fa-solid fa-rotate ps-2 pe-2"></i>
								<span>Update Now</span>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- section for user data table -->
	<section id="table" class="mt-3">
		<div class="row">
			<div class="col-xl-10 col-lg-9 ms-auto" >	
				<div class="row mt-md-5 px-1">
					<div class="col-md-9 mx-auto">
						<?php include('messages.php'); ?>
						<div class="table-responsive">
						<table class="table table-dark table-striped ms-auto text-center">
 						  <thead>
						    <tr class="fs-4">
						      <th>ID</th>
						      <th>Twitter</th>
						      <th>Discord</th>
						      <th>Wallet Address</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php 
						  			// define how many record you want per page
      							$record_per_page = 10;
                                    $query = "SELECT * FROM form";
                                    $query_run = mysqli_query($conn, $query);
                                    $number_of_record = mysqli_num_rows($query_run);

                                    // determine number of total pages available
      								$number_of_page = ceil($number_of_record / $record_per_page);
      								// determine which page number visitor is current on
								      if (!isset($_GET['page'])) {
								        $page = 1;
								      }else{
								        $page = $_GET['page'];
								      }

								     // determine the sql LIMIT starting number for the result on the displaying page
      								$starting_record = ($page - 1) * $record_per_page;
						  		if (isset($_POST['submitSearch'])) {
						  				// echo "<script>alert('Hi')</script>";
						  			$searchData = $_POST['searchData'];
						  			//retrieve selected results from database and display them on page
						  			$query = "SELECT * FROM form WHERE id LIKE '%$searchData%' OR twitter LIKE '%$searchData%' OR 
						  				discord LIKE '%$searchData%' OR walletaddress LIKE '%$searchData%'";
						  			$query_run = mysqli_query($conn, $query);

						  			if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $user){ 
                                            ?>
								    <tr>
								      <th><?= $user['id']; ?></th>
								      <td><?= $user['twitter']; ?></td>
								      <td><?= $user['discord']; ?></td>
								      <td><?= $user['walletaddress']; ?></td>
								      <td>
								      	<a href="user-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm mb-2 mb-md-0">View</a>
		                                 <a href="user-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm mb-2 mb-md-0">Edit</a>
		                                 <form action="dash-code.php" method="POST" class="d-inline">
		                               		<button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are u sure u want to delete?'); ">Delete</button>
		                                 </form>
								      </td>
								    </tr>
						    	<?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
						  		}else{
      								//retrieve selected results from database and display them on page
								     $sql = "select * from form limit ".$starting_record.','.$record_per_page;
								      $result = mysqli_query($conn,$sql);
								    
                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $user){ 
                                            ?>
						    <tr>
						      <th><?= $user['id']; ?></th>
						      <td><?= $user['twitter']; ?></td>
						      <td><?= $user['discord']; ?></td>
						      <td><?= $user['walletaddress']; ?></td>
						      <td>
						      	<a href="user-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm mb-2 mb-md-0">View</a>
                                 <a href="user-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm mb-2 mb-md-0">Edit</a>
                                 <form action="dash-code.php" method="POST" class="d-inline">
                               		<button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are u sure u want to delete?'); ">Delete</button>
                                 </form>
						      </td>
						    </tr>
						    <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                }?>
						  </tbody>
						</table>
						</div>
						<nav aria-label="Page navigation example">
          					<ul class="pagination justify-content-center pagination-lg">
            				<?php for ($page=1; $page <= $number_of_page ; $page++) { ?>
              			<li class="page-item "><?php echo '<a class="page-link  bg-dark" href="dash.php?page='.$page.'">'.$page.'</a>'; ?>
              			</li>
           					<?php  }  ?> 
          					</ul> 
        				</nav>
					</div>	
				</div>
			</div>
		</div>
	</section>


</body>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<link rel="icon" type="image" href="noobboy.jpg">
	<script src="https://kit.fontawesome.com/a4490760ee.js" crossorigin="anonymous"></script>
</html>