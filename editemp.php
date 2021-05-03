<?php
define ('TITLE', 'Update Technician');
define ('PAGE', 'Technician');
include('../dbConnection.php');
include('includes/header.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'</script>";
}
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
        if(isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM technician_tb WHERE empid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_REQUEST['tehupdate'])) {
        // Checking for Empty Fields
        if(($_REQUEST['empid'] == "") || ($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $empid = $_REQUEST['empid'];
            $empName = $_REQUEST['empName'];
            $empCity = $_REQUEST['empCity'];
            $empMobile = $_REQUEST['empMobile'];
            $empEmail = $_REQUEST['empEmail'];

            $sql = "UPDATE technician_tb SET empid = '$empid', empName = '$empName', empCity = '$empCity', empMobile = '$empMobile', empEmail = '$empEmail' WHERE empid = '$empid'";
            if($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Technician Updated Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update Technician</div>';
            }
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="empid">Technician ID</label>
            <input type="text" class="form-control" id="empid" name="empid" value="<?php if(isset($row['empid'])) echo $row['empid']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName" value="<?php if(isset($row['empName'])) echo $row['empName']; ?>">
        </div>
        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if(isset($row['empCity'])) echo $row['empCity']; ?>">
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if(isset($row['empMobile'])) echo $row['empMobile']; ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" id="empEmail" name="empEmail" value="<?php if(isset($row['empEmail'])) echo $row['empEmail']; ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" id="tehupdate" name="tehupdate">Update</button>
            <a href="technician.php" class="btn btn-secondary mt-3">Close</a>
        </div>
        <?php if(isset($msg)) { echo $msg; } ?>
    </form>
</div>
<!-- End 2nd Column -->

<!-- Only numbers for input fields -->
<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>

<?php
include('includes/footer.php');
?>
