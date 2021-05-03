<?php
define ('TITLE', 'Technician');
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
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white p-2">List of Techinicians</p>
    <?php
        $sql = "SELECT * FROM technician_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo '
            <table class="table">
             <thead>
              <tr>
                <th scope="col">Technician ID</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
             </thead>
             <tbody>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['empid'].'</td>';
                echo '<td>'.$row['empName'].'</td>';
                echo '<td>'.$row['empCity'].'</td>';
                echo '<td>'.$row['empMobile'].'</td>';
                echo '<td>'.$row['empEmail'].'</td>';
                echo '<td>';
                    echo '<form action="editemp.php" method="POST" class="d-inline mr-2">';
                        echo '<input type="hidden" name="id" value='.$row['empid'].'><button class="btn btn-info" name="edit" value="Edit" type="submit"><i class="fas fa-pen"></i></button> ';
                    echo '</form>';
                    echo '<form action="" method="POST" class="d-inline">';
                    echo '<input type="hidden" name="id" value='.$row['empid'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button> ';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>
            </table>';
        }  else {
            echo 'No Result';
        }
    ?>
</div>
<?php
     if(isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo 'Unable to Delete Data';
        }
    }
?>
<!-- End 2nd Column -->

</div> <!-- End Row -->
<div class="float-right">
    <a href="insertemp.php" class="btn btn-outline-success"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div> <!-- End Container -->

<!-- Jquery -->
<script src="../js/jquery.min.js"></script>

<!-- Popper JS -->
<script src="../js/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js"></script>

<!-- Font Awesome JS -->
<script src="../js/all.min.js"></script>

</body>
</html>
</body>
</html>
