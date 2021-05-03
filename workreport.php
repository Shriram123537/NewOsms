<?php
define ('TITLE', 'Work Report');
define ('PAGE', 'WorkReport');
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
<div class="col-sm-9 col-md-10 mt-5">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" name="startdate" id="startdate">
            </div> <ul class="mt-2"> to </ul>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" name="enddate" id="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info mt-3" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php
        if(isset($_REQUEST['searchsubmit'])) {
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            $sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
                echo '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Req ID</th>
                        <th scope="col">Requester Info</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Technician</th>
                        <th scope="col">Assigned Date</th>
                    </tr>
                    </thead>
                    <tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>'.$row['request_id'].'</td>';
                        echo '<td>'.$row['request_info'].'</td>';
                        echo '<td>'.$row['requester_name'].'</td>';
                        echo '<td>'.$row['requester_add2'].'</td>';
                        echo '<td>'.$row['requester_city'].'</td>';
                        echo '<td>'.$row['requester_mobile'].'</td>';
                        echo '<td>'.$row['assign_tech'].'</td>';
                        echo '<td>'.$row['assign_date'].'</td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="submit" class="btn btn-outline-dark d-print-none" value="Print" onClick="window.print()">';
                        echo '</td>';
                    echo '</tr>';

                    echo '</tbody>
                    </table>';
            }  else {
                echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found! </div>";
        }
    }
    ?>
</div>
<!-- End 2nd Column -->


<?php
include('includes/footer.php');
?>
