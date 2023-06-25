<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "AKSM", "form_db");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
