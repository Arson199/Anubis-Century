<?php
    session_start();
    $errors = true;
    include_once('connection.php');
    include_once('visitors.php');
    // $errors = array('twitter' => '','discord' => '','walletaddress' => '');
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
      if (mysqli_num_rows($twitterDuplicate) > 0 && mysqli_num_rows($discordDuplicate) > 0 &&
        mysqli_num_rows($walletaddressDuplicate) > 0) {
        $errors = false;
        $_SESSION['twitter_duplicate'] = "Twitter Name already submitted!";
        $_SESSION['discord_duplicate'] = "Discord Name already submitted!";
        $_SESSION['walletaddress_duplicate'] = "Walletaddress already submitted!";
      }
      if (mysqli_num_rows($twitterDuplicate) > 0 && mysqli_num_rows($discordDuplicate) > 0) {
        $errors = false;
        $_SESSION['twitter_duplicate'] = "Twitter Name already submitted!";
        $_SESSION['discord_duplicate'] = "Discord Name already submitted!";
      }
      if (mysqli_num_rows($discordDuplicate) > 0 &&
        mysqli_num_rows($walletaddressDuplicate) > 0) {
        $errors = false;
        $_SESSION['discord_duplicate'] = "Discord Name already submitted!";
        $_SESSION['walletaddress_duplicate'] = "Walletaddress already submitted!";
      }
      if (mysqli_num_rows($twitterDuplicate) > 0 &&
        mysqli_num_rows($walletaddressDuplicate) > 0) {
        $errors = false;
        $_SESSION['twitter_duplicate'] = "Twitter Name already submitted!";
        $_SESSION['walletaddress_duplicate'] = "Walletaddress already submitted!";
      }

            if (mysqli_num_rows($twitterDuplicate) > 0) {
              $errors = false;
              $_SESSION['twitter_duplicate'] = "Twitter Name already submitted!";
            }
            if (mysqli_num_rows($discordDuplicate) > 0) {
              $errors = false;
              $_SESSION['discord_duplicate'] = "Discord Name already submitted!";
            }
          if (mysqli_num_rows($walletaddressDuplicate) > 0) {
            $errors = false;
            $_SESSION['walletaddress_duplicate'] = "Walletaddress already submitted!";
            }
        if ($errors) {
          $sql = "insert into form(twitter,discord,walletaddress) values('$twitter','$discord','$walletaddress')";  
        $result = mysqli_query($conn, $sql); 
        if($result){   
        $_SESSION['message'] = "Success";     
        
          }
            else{
            $_SESSION['message'] = "Error";
        }
        }
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
    <link rel="icon" type="image" href="images/trasparent black.png">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
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
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="ms-5 ps-2 mt-0">
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
                        <span>eg.Arson#3802</span>
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
                <div class="cf-turnstile mt-4" data-sitekey="0x4AAAAAAAGHhNA0SeDJyciR" data-theme="dark" data-callback="javascriptCallback"></div>
              <input type="submit" class="mt-3 btn-lg btn btn-outline-info" name="submit" value="Submit">
              </form>
            </div>
            <div class="col-2" class="w-100">
              <img src="images/Liberty.png" >
            </div>           
          </div>
        </div>
        <div class="d-xl-none d-block text-center hover-zoom" >
          <img src="images/new-logo.jpg" class="image-ph-logo mt-2">
          <p class="title-ph-1 mt-1 text-white mb-0">Anubis Century</p>
          <div class="d-flex justify-content-center">
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
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
                <div class="row mt-1">
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
                <div class="row mt-1">
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
                <div class="cf-turnstile mt-2" data-size="normal" data-sitekey="1x00000000000000000000AA" data-theme="dark" data-callback="javascriptCallback"></div>
              <input type="submit" class="mt-2 mb-5 btn-lg btn btn-outline-info" name="submit" value="Submit">
              </form>
              <div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        // This is the demo secret key. In production, we recommend
// you store your secret key(s) safely.
const SECRET_KEY = '1x0000000000000000000000000000000AA';

async function handlePost(request) {
	const body = await request.formData();
	// Turnstile injects a token in "cf-turnstile-response".
	const token = body.get('cf-turnstile-response');
	const ip = request.headers.get('CF-Connecting-IP');

	// Validate the token by calling the
	// "/siteverify" API endpoint.
	let formData = new FormData();
	formData.append('secret', SECRET_KEY);
	formData.append('response', token);
	formData.append('remoteip', ip);

	const url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
	const result = await fetch(url, {
		body: formData,
		method: 'POST',
	});

	const outcome = await result.json();
	if (outcome.success) {
		// ...
	}
}
    </script>
  </body>
</html>