<?php
    session_start();
    include('connection.php');
    $twitter = null;   
    $discord = null;
    $walletaddress = null;
    $errors = array('twitter' => '','discord' => '','walletaddress' => '');
if (isset($_POST['submit'])) {
        $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
        $discord = mysqli_real_escape_string($conn,$_POST['discord']);
        $walletaddress = mysqli_real_escape_string($conn,$_POST['walletaddress']);

        if (empty(trim($twitter))) {
            // $_SESSION['twitter_error'] = "Twitter Name is Empty!";
            $errors['twitter'] = "Twitter Name is Empty!";
           // header("Location: form.php");
            
        }elseif(empty(trim($discord))){
            // $_SESSION['discord_error'] = "Discord Name is Empty!";
            // header("Location: form.php");
            $errors['discord'] = "Discord Name is Empty!";
            
        }elseif (empty(trim($walletaddress))) {
            // $_SESSION['walletaddress_error'] = "Wallet Address is Empty!";
            // header("Location: form.php");
            $errors['walletaddress'] = "Wallet Address is Empty!";
        }else{

            $sql = "insert into form(twitter,discord,walletaddress) values('$twitter','$discord','$walletaddress')";  
        $result = mysqli_query($conn, $sql); 
        if($result){
            $_SESSION['message'] = "Submited Successfully";

            header("Location: form.php");
            }
        else{
            $_SESSION['message'] = "Error";
            header("Location: form.php");
        }
        }
        
        // mysqli_close($conn);
    }
    ?>
