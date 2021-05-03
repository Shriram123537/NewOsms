<?php
define ('TITLE', 'Work Order');
define ('PAGE', 'Work');
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
    <?php
        $sql = "SELECT * FROM assignwork_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo '
            <table class="table">
             <thead>
              <tr>
                <th scope="col">Request ID</th>
                <th scope="col">Request Info</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Technician</th>
                <th scope="col">Assigned Date</th>
                <th scope="col">Action</th>
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
                echo '<td>';
                    echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
                        echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="view" value="View" type="submit"><i class="far fa-eye"></i></button> ';
                    echo '</form>';
                    echo '<form action="" method="POST" class="d-inline">';
                    echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary mt-3" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button> ';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>
            </table>';
        } else {
            echo 'No Result';
        }
        if(isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo 'Unable to Delete Data';
        }
    }
    ?>
</div>
<!-- End 2nd Column -->


<?php
include('includes/footer.php');
?>
