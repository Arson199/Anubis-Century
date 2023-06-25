<?php 
session_start();
include 'header.php';
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
             <h4>User Add
                <a href="dash.php" class="btn btn-danger float-end">BACK</a>
             </h4>
           </div>
           <div class="card-body">
             <form action="dash-code.php" method="POST">

                <div class="mb-3">
                  <label>Twitter Name</label>
                  <input type="text" name="twitter" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Discord Name</label>
                  <input type="text" name="discord" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Wallet address</label>
                  <input type="text" name="walletaddress" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="save_user" class="btn btn-primary">Save</button>
                </div> 
             </form>
           </div>
         </div>
       </div>
     </div>
     
    <?php include 'footer.php'; ?>