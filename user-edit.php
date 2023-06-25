<?php 
session_start();
require 'connection.php';
require 'header.php';
 ?>
  <style>
    body{
      background: #91bad6;
    }
  </style>

     <div class="container mt-5">
          <?php include('messages.php'); ?>
       <div class="row">
         <div class="col-md-12">
           <div class="card-header">
             <h4>User Edit
                <a href="dash.php" class="btn btn-danger float-end">BACK</a>
             </h4>
           </div>
           <div class="card-body">
              <?php 
                  if (isset($_GET['id'])) {
                   $user_id = mysqli_real_escape_string($conn,$_GET['id']);
                   $query   ="SELECT * FROM form WHERE id='$user_id' ";
                   $query_run = mysqli_query($conn,$query);

                   if (mysqli_num_rows($query_run) > 0) {
                     $user = mysqli_fetch_array($query_run); 
              ?>
              <form action="dash-code.php" method="POST">
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <div class="mb-3">
                  <label>Twitter Name</label>
                  <input type="text" value="<?= $user['twitter']; ?>" name="twitter" class="form-control text-white bg-dark">
                </div>
                <div class="mb-3">
                  <label>Discord Name</label>
                  <input type="text" value="<?= $user['discord']; ?>" name="discord" class="form-control text-white bg-dark">
                </div>
                <div class="mb-3">
                  <label>Wallet Address</label>
                  <input type="text" value="<?= $user['walletaddress']; ?>" name="walletaddress" class="form-control text-white bg-dark">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                </div> 
             </form>
              <?php
                  }
                   else {
                     echo "<h4>No Such ID Found</h4>";
                   }
                  }
              ?>
           </div>
         </div>
       </div>
     </div>

     <?php include 'footer.php'; ?>