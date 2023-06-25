<?php
    if(isset($_SESSION['twitter_empty'])) :
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toast</title>
    <link rel="stylesheet" href="toast/toastr.min.css" />
  </head>
  <body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="toast/toastr.min.js"></script>
    <script>        
    toastr.options = {
  "closeButton": true, 
  "debug": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr["error"]("Twitter is Empty!", "Error")
    </script>
  </body>
</html>
<?php 
    unset($_SESSION['twitter_empty']);
    endif;
?>