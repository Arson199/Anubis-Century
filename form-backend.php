<?php
    session_start();
    include_once('connection.php');
    $errors = array('twitter' => '','discord' => '','walletaddress' => '');
    $twitter = null;   
    $discord = null;
    $walletaddress = null;
if (isset($_POST['submit'])) {
    $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
    $discord = mysqli_real_escape_string($conn,$_POST['discord']);
    $walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);
    
    $twitterDu = "select twitter from form where twitter='$twitter'";
    $twitterDuplicate = mysqli_query($conn,$twitterDu);

    $discordDu = "select discord from form where discord='$discord'";
    $discordDuplicate = mysqli_query($conn,$discordDu);

    $walletaddressDu = "select walletaddress from form where walletaddress='$walletaddress'";
    $walletaddressDuplicate = mysqli_query($conn,$walletaddressDu);

        if (empty(trim($twitter))) {
            // $_SESSION['twitter_error'] = "Twitter Name is Empty!";
            $errors['twitter'] = "Twitter Name is Empty!";
             include 'test77.php';
           // header("Location: form.php");  
             
        }else{
            $twitter= htmlspecialchars($_POST['twitter']);
            if (mysqli_num_rows($twitterDuplicate) > 0) {
                $errors['twitter'] = "Twitter Name already submitted!";
            }
        }
        if(empty(trim($discord))){
            // $_SESSION['discord_error'] = "Discord Name is Empty!";
            // header("Location: form.php");
            $errors['discord'] = "Discord Name is Empty!";
            include 'test88.php';
            // include_once 'test6.php';
        }else{
            $discord = htmlspecialchars($_POST['discord']);
            if (mysqli_num_rows($discordDuplicate) > 0) {
                $errors['discord'] = "Discord Name already submitted!";
            }
        }
        if (empty(trim($walletaddress))) {
            // $_SESSION['walletaddress_error'] = "Wallet Address is Empty!";
            // header("Location: form.php");
            $errors['walletaddress'] = "Wallet Address is Empty!";
            // include_once 'test9.php';
        }else{
          $walletaddress = htmlspecialchars($_POST['walletaddress']);
          if (mysqli_num_rows($walletaddressDuplicate) > 0) {
                $errors['walletaddress'] = "Walletaddress already submitted!";
            }
        }
    if (!array_filter($errors)) {
        //  $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
        // $discord = mysqli_real_escape_string($conn,$_POST['discord']);
        // $walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);
    $sql = "insert into form(twitter,discord,walletaddress) values('$twitter','$discord','$walletaddress')";  
        $result = mysqli_query($conn, $sql); 
        if($result){
            // $_SESSION['message'] = "Submited Successfully";
            include_once 'test4.php';
            $twitter ="";
            $discord ="";
            $walletaddress ="";
            // header("Location: form.php");
            
            // echo "<script>alert(\"Successfully Submited\")</script>";
            }
        else{
            $_SESSION['message'] = "Error";
            header("Location: form.php");
            exit(0);
            // echo "<script>alert(\"Error\")</script>";
        }
        
        // mysqli_close($conn);
        }
        }
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="form.css">
   <?php include('message.php'); ?>
</head>
<body>
           
     <!-- <form method="POST" action="submit.php">
        <label for="Twitter">Twitter:</label>
        <input type="text" id="Twitter" name="twitter"><br>

        <label for="Discord">Discord:</label>
        <input type="text" id="Discord" name="discord"><br>

        <label for="wallet address">Wallet address:</label>
        <input type="text" id="wallet address" name="walletaddress"><br>

        <input type="submit" value="Submit" name="submit">
     </form> -->
     <?php //include_once 'test5.php'; ?>
  <form class="container m-auto row mt-5" method="POST" action="form.php">

      <div class="col-md-6">
        <label for="Twitter" class="form-label">Twitter:</label>
        <div class="input-group">
          <span class="input-group-text border border-primary" id="inputGroupPrepend3">@</span>
          <input type="text" class=" form-control border border-primary" value="<?php echo $twitter; ?>" name="twitter" id="Twitter">
        </div>
        <p class="text-danger"><?php echo $errors['twitter'] ?></p>
         <!-- <?php include('twitter_err.php'); ?> -->
      </div>
      <div class="col-md-6 mt-3 mt-md-0 ">
        <label for="Discord" class="form-label">Discord:</label>
        <input type="text" value="<?php echo $discord; ?>" class="form-control border border-primary" id="Discord" name="discord">
        <p class="text-danger"><?php echo $errors['discord'] ?></p>
         <!-- <?php include('discord_err.php'); ?> -->
         
      </div>
      <div class="col-12 mb-5 mt-3">
        <label for="wallet address" class="form-label">Wallet address:</label>
        <input type="text" value="<?php echo $walletaddress; ?>" class="form-control border border-primary" id="wallet address" name="walletaddress">
        <p class="text-danger"><?php echo $errors['walletaddress'] ?></p>
        <!-- <?php include('walletaddress_err.php'); ?> -->
        
      </div>
      <input type="submit" class="btn btn-primary btn-sm" value="Submit" name="submit">
  </form>
</body>
</html>