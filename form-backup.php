<?php
    session_start();
    include_once('connection.php');
    $errors = array('twitter' => '','discord' => '','walletaddress' => '');
    $ttwitter = null;   
    $ddiscord = null;
    $wwalletaddress = null;
if (isset($_POST['submit'])) {
    $_SESSION['ttwitter'] = $_POST['twitter'];
    $_SESSION['ddiscord'] = $_POST['discord'];
    $_SESSION['wwalletaddress'] = $_POST['walletaddress']; 
    // echo "<script>alert('$ttwitter')</script>";
    $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
    $discord = mysqli_real_escape_string($conn,$_POST['discord']);
    $walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);
    $twitterDu = "select twitter from form where twitter='$twitter'";
    $twitterDuplicate = mysqli_query($conn,$twitterDu);

    $discordDu = "select discord from form where discord='$discord'";
    $discordDuplicate = mysqli_query($conn,$discordDu);

  $walletaddressDu = "select walletaddress from form where walletaddress='$walletaddress'";
    $walletaddressDuplicate = mysqli_query($conn,$walletaddressDu);

            if (mysqli_num_rows($twitterDuplicate) > 0) {

              $_SESSION['twitter_duplicate'] = "Twitter Name already submitted!";
              header("Location: form.php");
              exit(0);
            }
            if (mysqli_num_rows($discordDuplicate) > 0) {
              $_SESSION['discord_duplicate'] = "Discord Name already submitted!";
                header("Location: form.php");
                exit(0);
            }
          if (mysqli_num_rows($walletaddressDuplicate) > 0) {
            $_SESSION['walletaddress_duplicate'] = "Walletaddress already submitted!";
                header("Location: form.php");
                exit(0);
            }
        // if (!array_filter($errors)) {
          $sql = "insert into form(twitter,discord,walletaddress) values('$twitter','$discord','$walletaddress')";  
        $result = mysqli_query($conn, $sql); 
        if($result){   
        $_SESSION['message'] = "Success";     
          header("Location: form.php");
            exit(0);
          }
            else{
            $_SESSION['message'] = "Error";
            header("Location: form.php");
            exit(0);
        }
        // }
        mysqli_close($conn);
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="form-pc.css">
    <link rel="stylesheet" type="text/css" href="form_ph.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Foldit">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bruno Ace SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Creepster">
    <link rel="icon" type="image" href="images/Trasparent black.png">
  </head>
  <style>
    html,body {
    padding: 0;
    margin: 0;
    }
    .main{
      width: 100%;
      height: 100%;
      background-image:url('images/form-bg.png');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: fixed;
    }
      .btn:hover{
            color: red;
            background-color: black;
            border-color:;
      }
      .hover-zoom img, .hover-zoom video {
    transition: all .3s linear;
  }
  .hover-zoom:hover img, .hover-zoom:hover video {
    transform: scale(0.95);
  }
@media (max-width: 617px) {
    .title-2-1{
      font-size: 1em;
    }
    .title-3-1{
      font-size: 1em;
    }
  
}
@media (max-width: 1200px) {
     .image-ph-logo{
    width: 30vw;
  } 
}
@media (max-width: 972px) {
     .image-ph-logo{
    width: 45vw;
  } 
}
@media (max-width: 500px) {
     .image-ph-logo{
    width: 60vw;
  } 
}
  </style>
  <body>
    <?php 
    include 'twitter-duplicate.php';
    include 'discord-duplicate.php';
    include 'walletaddress-duplicate.php';
    ?>
      <div class="main blur">
        <?php include_once 'test4.php' ?>
        <div class="d-none d-xl-block w-50">
          <div class="row">     
            <div class="col-10 px-0 text-center mt-3 hover-zoom">
              <img src="images/new-logo.jpg" class="w-50">
              <p class="title-1 mt-2 text-white mb-4">Anubis Century</p>
              <form method="POST" action="form.php" class="ms-5 ps-2 mt-0">
                <div class="row">
                  <div class="col-3 pe-0">
                    <label class="title-2">Twitter :</label>
                  </div>
                  <div class="col-9 ps-1">
                    <div class="inputBox mt-4 px-0">
                        <input type="text" required name="twitter" value="<?php echo $ttwitter; ?>" autocomplete="off">
                        <span>eg.@ArsonWinchester</span>
                        <i></i>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-3 pe-0">
                    <label class="title-2">Discord :</label>
                  </div>
                  <div class="col-9 ps-1">
                    <div class="inputBox mt-4 px-0">
                        <input type="text" required name="discord" value="<?php echo $ddiscord; ?>" autocomplete="off">
                        <span>eg.KoTokeGyi#3802</span>
                        <i></i>
                    </div>
                  </div>
                </div>
                
                <div class="row mt-3">
                  <div class="col-5 pe-0">
                    <label class="title-3">Wallet Address :</label>
                  </div>
                  <div class="col-7 ps-0">
                    <div class="inputBox mt-4 px-0">
                      <input type="text" required name="walletaddress" value="<?php echo $wwalletaddress; ?>" autocomplete="off">
                        <span>eg.0x4axxxxxxxxxx</span>
                        <i></i>
                    </div>
                  </div>
                </div>
              <input type="submit" class="mt-5 btn-lg btn btn-outline-info" name="submit" value="Submit">
              </form>
            </div>
            <div class="col-2" class="w-100">
              <img src="images/Liberty.png" >
            </div>           
          </div>
        </div>
        <div class="d-xl-none d-block text-center hover-zoom" >
          <img src="images/new-logo.jpg" class="image-ph-logo mt-2">
          <p class="title-ph-1 mt-1 text-white">Anubis Century</p>
          <div class="d-flex justify-content-center">
              <form method="POST" action="form.php">
                <div class="row">
                  <div class="col-4 text-end">
                    <label class="title-2-1">Twitter :</label>
                  </div>
                  <div class="col-8 ps-1">
                    <div class="inputBox-2 mt-4 px-0">
                        <input class="ph-input" type="text" required name="twitter" value="<?php echo $ttwitter; ?>" autocomplete="off">
                        <span class="span">eg.@ArsonWinchester</span>
                        <i class="ii"></i>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-4 text-end">
                    <label class="title-2-1">Discord :</label>
                  </div>
                  <div class="col-8 ps-1">
                    <div class="inputBox-2 mt-4 px-0">
                        <input class="ph-input" type="text" required name="discord" value="<?php echo $ddiscord; ?>" autocomplete="off">
                        <span class="span">eg.Arson#3802</span>
                        <i class="ii"></i>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-4 text-end">
                    <label class="title-3-1 text-center">Wallet Address :</label>
                  </div>
                  <div class="col-8 ps-0 pt-2">
                    <div class="inputBox-2 mt-4 px-0">
                        <input class="ph-input" type="text" required name="walletaddress" value="<?php echo $wwalletaddress; ?>" autocomplete="off">
                        <span class="span">eg.0x4axxxxxxxxxx</span>
                        <i class="ii"></i>
                    </div>
                  </div>
                </div>
              <input type="submit" class="mt-5 btn-lg btn btn-outline-info" name="submit" value="Submit">
              </form>
              <div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>