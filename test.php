<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alert</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
	.alert {	
		padding: 0px;
			width: 400px;
			height: 60px;
			margin-top: 15%;
			margin-left: 40%;

/*			margin:auto;*/
		  position: absolute;
		  background-color: #7B85B7;
		  border-radius: 15px 0px 15px 0px;
		  box-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
  		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
		}
		.side{
			display:block;
			width: 2.5vw;
			position: absolute;
		}
		.right-top{
			top: 0;
			right: 0;
		}
		.left-bottom{
			bottom: 0;
			left: 0;
		}
		.circle{
			display: inline-block;
			text-decoration: none;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			background-image:url('images/circle.png');
			background-repeat: no-repeat;
			background-size: 60px 200px;
			left: 10%;
			color: white;
/*			text-align: center;*/
			position: absolute;
		}
		.message-text{
			left: 30%;
			top: 25%;
			position: absolute;
		}
		.c1{
			padding-top: 8px;
			font-size: 1.5em;
		}
</style>
<body>
	<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert"> -->
	     <div class="alert alert-dismissible fade show">
		  	<a href="form.php" class="circle" data-bs-dismiss="alert" aria-label="Close"><p class="c1">OK</p></a>
		  	<p class="message-text">Wallet Address is Empty!</p class="message-text">
		    <img src="images/2.png" class="side right-top">
		    <img src="images/3.png" class="side left-bottom">
		 </div>
    <!-- </div> -->
</body>
</html>