<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo TITLE ?></title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
    </nav>

    <!-- Start Container -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row"> <!-- Start Row -->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> <!-- Sidebar -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Dashboard') { echo 'active';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Work') { echo 'active';} ?>" href="work.php"><i class="fab fa-accessible-icon"></i> Work Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Requests') { echo 'active';} ?>" href="request.php"><i class="fas fa-align-center"></i> Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Assets') { echo 'active';} ?>" href="assets.php"><i class="fas fa-database"></i> Assets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Technician') { echo 'active';} ?>" href="technician.php"><i class="fas fa-headset"></i> Technician</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Requesters') { echo 'active';} ?>" href="requester.php"><i class="fas fa-users"></i> Requester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'SellReport') { echo 'active';} ?>" href="soldproductreport.php"><i class="fas fa-table"></i> Sell Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'WorkReport') { echo 'active';} ?>" href="workreport.php"><i class="fas fa-table"></i> Work Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ChangePass') { echo 'active';} ?>" href="changepass.php"><i class="fas fa-key"></i> Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav> <!-- /Sidebar -->
