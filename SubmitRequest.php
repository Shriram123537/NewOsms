<?php
define ('TITLE', 'Submit Request');
define ('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');

session_start();

if($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])) {
    // Checking for empty fields
    if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") ||
        ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") ||
        ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") ||
        ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requesterdate'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
       $rinfo = $_REQUEST['requestinfo'];
       $rdesc = $_REQUEST['requestdesc'];
       $rname = $_REQUEST['requestername'];
       $radd1 = $_REQUEST['requesteradd1'];
       $radd2 = $_REQUEST['requesteradd2'];
       $rcity = $_REQUEST['requestercity'];
       $rstate = $_REQUEST['requesterstate'];
       $rzip = $_REQUEST['requesterzip'];
       $remail = $_REQUEST['requesteremail'];
       $rmobile = $_REQUEST['requestermobile'];
       $rdate = $_REQUEST['requesterdate'];

       $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date)
                VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
       if($conn->query($sql) == TRUE) {
            $genid = mysqli_insert_id($conn);
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Request Submitted Successfully</div>';
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='submitrequestsuccess.php'</script>";
       } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Submit Your Request</div>';
       }
    }

}
?>


<div class="col-sm-9 col-md-10 mt-5"> <!-- Start Service Request Form -->
    <form class="mx-5" action="" method="POST">
        <div class="form-group">
            <label for="inputRequestInfo"><strong>Request Info</strong></label>
            <input class="form-control " type="text" name="requestinfo" id="inputRequestInfo" placeholder="Request Info">
        </div>
        <div class="form-group">
            <label for="inputRequestDescription"><strong>Description</strong></label>
            <textarea class="form-control mt-2" name="requestdesc" id="inputRequestDescription" rows="4" placeholder="Write Description"></textarea>
            <!-- <input class="form-control" type="text" name="requestdesc" id="inputRequestDescription" placeholder="Write Description"> -->
        </div>
        <div class="form-group">
            <label for="inputName"><strong>Name</strong></label>
            <input class="form-control mt-2" type="text" name="requestername" id="inputName" placeholder="Ram">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress"><strong>Address Line 1</strong></label>
                <input class="form-control mt-2" type="text" name="requesteradd1" id="inputAddress" placeholder="House No. 123">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2"><strong>Address Line 2</strong></label>
                <input class="form-control mt-2" type="text" name="requesteradd2" id="inputAddress2" placeholder="Railway Colony">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity"><strong>City</strong></label>
                <input class="form-control mt-2" type="text" name="requestercity" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState"><strong>State</strong></label>
                <input class="form-control mt-2" type="text" name="requesterstate" id="inputState">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip"><strong>Zip</strong></label>
                <input class="form-control mt-2" type="text" name="requesterzip" id="inputZip" onkeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail"><strong>Email</strong></label>
                <input class="form-control mt-2" type="email" name="requesteremail" id="inputEmail">
            </div>
            <div class="form-group col-md-2">
                <label for="inputMobile"><strong>Mobile</strong></label>
                <input class="form-control mt-2" type="text" name="requestermobile" id="inputMobile" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-2">
                <label for="inputDate"><strong>Date</strong></label>
                <input class="form-control mt-2" type="date" name="requesterdate" id="inputDate">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary mt-3" name="resetrequest">Reset</button>
    </form>
    <?php if(isset($msg)) { echo $msg; } ?>
</div> <!-- ENd Service Request Form -->

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
