<?php
if(session_id() =='') {
    session_start();
}

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['view'])) {
    $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if(isset($_REQUEST['close'])) {
    $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
    } else {
        echo 'Unable to Delete';
    }
}

if(isset($_REQUEST['assign'])) {
    // Checking for Empty Fields
    if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "")
    || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") ||
    ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")
    ) {
        // Msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['address1'];
        $radd2 = $_REQUEST['address2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rtech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputdate'];

        $sql = "INSERT INTO assignwork_tb(request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date )
                VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rtech', '$rdate')";
        if($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Work Assigned Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Assign Work</div>';
        }
    }
}
?>


<!-- Start 3rd Column -->
<div class="col-sm-5 mt-5 jumbotron">
        <form action="" method="POST">
            <h5 class="text-center"><strong>Assign Work Order Request</strong></h5>
            <div class="form-group">
                <label for="request_id">Request ID</label>
                <input type="text" class="form-control" name="request_id" id="request_id" value="<?php if(isset($row['request_id'])) echo $row['request_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="request_info">Request Info</label>
                <input type="text" class="form-control" name="request_info" id="request_info" value="<?php if(isset($row['request_info'])) echo $row['request_info']; ?>">
            </div>
            <div class="form-group">
                <label for="requestdesc">Description</label>
                <textarea class="form-control" name="requestdesc" id="requestdesc" rows="4"><?php if(isset($row['request_desc'])) echo $row['request_desc']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="requestername">Name</label>
                <input type="text" class="form-control" name="requestername" id="requestername" value="<?php if(isset($row['requester_name'])) echo $row['requester_name']; ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address1">Address Line 1</label>
                    <input class="form-control" type="text" name="address1" id="address1" value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="address2">Address Line 2</label>
                    <input class="form-control" type="text" name="address2" id="address2" value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="requestercity">City</label>
                    <input class="form-control" type="text" name="requestercity" id="requestercity" value="<?php if(isset($row['requester_city'])) echo $row['requester_city']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="requesterstate">State</label>
                    <input class="form-control" type="text" name="requesterstate" id="requesterstate" value="<?php if(isset($row['requester_state'])) echo $row['requester_state']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="requesterzip">Zip</label>
                    <input class="form-control" type="text" name="requesterzip" id="requesterzip" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_zip'])) echo $row['requester_zip']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="requesteremail">Email</label>
                    <input class="form-control" type="email" name="requesteremail" id="requesteremail" value="<?php if(isset($row['requester_email'])) echo $row['requester_email']; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="requestermobile">Mobile</label>
                    <input class="form-control" type="text" name="requestermobile" id="requestermobile" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="assigntech">Assign to Technician</label>
                    <input class="form-control" type="text" name="assigntech" id="assigntech">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputdate">Date</label>
                    <input class="form-control" type="date" name="inputdate" id="inputdate">
                </div>
            </div>
            <div class="float-right mt-3">
                <button type="submit" class="btn btn-success" name="assign">Assign</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
        <?php if(isset($msg)) { echo $msg; } ?>
</div>

<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>
