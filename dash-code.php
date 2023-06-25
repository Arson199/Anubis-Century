<?php 
	session_start();
	require 'connection.php';
	
	if (isset($_POST['delete_user'])) {
		$user_id = mysqli_real_escape_string($conn,$_POST['delete_user']);
		$query = "DELETE FROM form WHERE id='$user_id'";
		$query_run = mysqli_query($conn,$query);

		if ($query_run) {
			$_SESSION['message'] = 'User Deleted Successfully';
			header("Location: dash.php");
			exit(0);
		}
		else{
			$_SESSION['message'] = 'User Not Deleted';
			header("Location: dash.php");
			exit(0);
			}
	}
	if (isset($_POST['update_user'])) {
		    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

		$twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
		$discord = mysqli_real_escape_string($conn,$_POST['discord']);
		$walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);

		$query = "UPDATE form SET twitter='$twitter', discord='$discord', walletaddress='$walletaddress' WHERE id='$user_id'";
		$query_run = mysqli_query($conn,$query);
		if ($query_run) {
			$_SESSION['message'] ="User Updated Successfully";
			header("Location:dash.php");
			exit(0);
		}
		else{
			$_SESSION['message'] ="Student Not Updated Successfully";
			header("Location:dash.php");
			exit(0);
		}
	}
	if (isset($_POST['save_user'])) {
		$user_id = mysqli_real_escape_string($conn,$_POST['id']);
		$twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
		$discord = mysqli_real_escape_string($conn,$_POST['discord']);
		$walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);

		
		$query = "INSERT INTO form (twitter,discord,walletaddress) VALUES ('$twitter','$discord','$walletaddress')";

		$query_run = mysqli_query($conn,$query);
		if ($query_run) {
			$_SESSION['message'] ="User Created Successfully";
			header("Location:user-add.php");
			exit(0);
		}
		else{
			$_SESSION['message'] = "User Not Created";
			header("Location: user-add.php");
			exit(0);
		}
	}

 ?>