<?php
define ('TITLE', 'Requester Profile');
define ('PAGE', 'RequesterProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();

if($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'</script>";
}

$sql = "SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email ='$rEmail'";
$result = $conn->query($sql);
 if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
 }
 if(isset($_REQUEST['nameupdate'])) {
    if($_REQUEST['rName'] == "") {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $rName = $_REQUEST['rName'];
        $sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
        if($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
 }
?>



  
         <div class="col-sm-6 mt-5">  <!-- Start Profile area  -->
           <form class="mx-5" action="" method="post">
             <div class="form-group">
               <label for="rEmail">Email</label><input type="email" name="rEmail" id="rEmail" value="<?php echo "$rEmail" ?>" readonly class="form-control mt-1">
             </div>
             <div class="form-group">
               <label for="rName">Name</label><input type="text" name="rName" id="rName" value="<?php echo "$rName" ?>" class="form-control mt-1">
             </div>
             <button type="submit" name="nameupdate" class="btn btn-danger mt-3">Update</button>
              <?php if(isset($msg)) { echo $msg; } ?>
           </form>
       </div>  <!-- End  Profile area  -->



       <?php
       include('includes/footer.php');
       ?>
