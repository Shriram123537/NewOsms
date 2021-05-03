<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])) {
    if(isset($_REQUEST['rEmail'])){
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));

        $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email ='".$rEmail."' AND r_password = '".$rPassword."' limit 1";
        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script>location.href='RequesterProfile.php';</script>";
            exit;
        } else {
            $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
        }
    }
} else {
    echo "<script>location.href='RequesterProfile.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<!-- bootstrap Css-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- Font Awesome Css-->
<link rel="stylesheet" href="../css/all.min.css">

    <title>Login</title>
  </head>
  <body>
  <div class="mb-3 mt-5 text-center" style="font-size: 30px;">
    <i class="far fa-handshake"></i>
    <span>Online Services Maintenance System</span>
    <i class="fas fa-stethoscope"></i>
  </div>
  <p class="text-center" style="font-size: 20px"><i class="fas fa-user-secret text-danger"></i>Requester Area</p>
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
     <div class="col-sm-6 col-md-4">
       <form  action="" class="shadow-lg p-4" method="post">
         <div class="form-group">
           <i class="fas fa-user"></i><label for="email" style="font-weight: bold" class=" pl-2 mt-3">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
           <small class="form-text">We'll never share your email with anyone else</small>
         </div>
         <div class="form-group">
           <i class="fas fa-key"></i><label for="pass" style="font-weight: bold" class="pl-2 mt-3">Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
         </div>
         <button type="submit" style="font-weight: bold" class="btn btn-outline-danger mt-3 btn-block shadow-sm" name="button">Login</button>
         <?php if (isset($msg)) {
             echo "$msg";
         } ?>
       </form>
       <div class="text-center"> <a href="../index.php" style="font-weight: bold" class="btn btn-info mt-3 shadow-sm">Back To Home</a>

       </div>
     </div>
    </div>
  </div>
  <!-- Javascript Awesome Css-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
  </body>
</html>
