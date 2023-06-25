<?php
require 'connection.php';
require 'header.php';
?>
<style>
    body{
      background: #91bad6;
    }
  </style>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User View Details 
                            <a href="dash.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM form WHERE id='$user_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Twitter Name</label>
                                        <p class="form-control">
                                            <?=$user['twitter'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Discord Name</label>
                                        <p class="form-control">
                                            <?=$user['discord'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Wallet Address</label>
                                        <p class="form-control">
                                            <?=$user['walletaddress'];?>
                                        </p>
                                    </div>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
    