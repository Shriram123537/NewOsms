<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Font Awesome  CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!--Google Font CSS  font-family: 'Ubuntu', sans-serif-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!--custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <title>OSMS</title>
  </head>
  <body>
    <!--Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed-top">
  <a href="index.php" class="navbar-brand">OSMS</a>
  <span class="navbar-text">Coustmer's Happiness is Our Aim</span>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
         <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
         <li class="nav-item"><a href="#Services" class="nav-link">Services</a>
         <li class="nav-item"><a href="#registration" class="nav-link">Registration</a>
         <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a>
         <li class="nav-item"><a href="#contact" class="nav-link">Contact</a>
   </li>
      </ul>
    </div>
  </nav>
  <!--End  Navigation -->
  <!--- Start Jombo tron -->
  <header class="jumbotron back-image" style="background-image:url(image/header.jpg);">
  <div style="margin-top: 50px" class="myclass">
    <h1 class="text-uppercase text-dark font-weight-bold">Welcome to OSMS</h1>
    <p style="font-size:24px">Coustmer's Happiness is Our Aim</p>
    <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
    <a href="#registration" class="btn btn-info mr-4">Sign Up</a>
</div>
</header>
<!--- Start   -->
<div class="container">
  <div class="jumbotron">
   <h3 class="text-center">OSMS Services</h3>
   <p style="font-family: 'Ubuntu', sans-serif">We are serving our customers all over India from a long time with having 8 years experience and more in home appliances repairing & servicing industry segment with a motto to provide best services to each & every customer connected with us.
    It is multibrand private service center.We are dealing only in out of warranty products with suitable service charges according to work.
    We always try to offer better customer support each and every time.Customer is king.Availability of human to human conversation in working hours 9:00 am to 8:00pm IST on all seven days of the week.</p>
  </div>
</div>
<!--- Start  Services Section-->
<div class="container text-center border-bottom" id="Services">
  <h2>Our Services</h2>
  <div class="row mt-4">
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
       <h4 class="mt-4">Electronic appliances</h4>
    </div>
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
       <h4 class="mt-4">Preventive Maintenance</h4>
    </div>
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
       <h4 class="mt-4">Fault Repair</h4>
    </div>
</div>
</div>
<!--- End  Services Section-->
<!--- Start  Registration Form Section-->
<?php include('UserRegistration.php') ?>
<!--- End Registration Form Section-->

<!--- Start  Happy Coustmer Section-->
<div class="jumbotron bg-info">
<div class="container">
  <h2 class="text-center text-white">Happy Customer</h2>
  <div class="row mt-5">
    <div class="col-lg-3 col-sm-5">
     <div class="card shadow-lg mb-3">
       <div class="card-body text-center">
     <img src="image/avtar1.jpg" class="img-fluid" style="border-radius: 500px" alt="avt1">
     <h4 class="card-title">Anjali Roy</h4>
     <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo  consectetur.</p>
          </div>
     </div>
    </div>

    <div class="col-lg-3 col-sm-5">
     <div class="card shadow-lg mb-3">
       <div class="card-body text-center">
     <img src="image/avtar2.jpg" class="img-fluid" style="border-radius: 500px" alt="avt2">
     <h4 class="card-title">Sonali Sharma</h4>
     <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo.sit amet, consectetur adipisicing elit.Lorem ipsum.</p>
          </div>
     </div>
    </div>

    <div class="col-lg-3 col-sm-5">
     <div class="card shadow-lg mb-3">
       <div class="card-body text-center">
     <img src="image/avtar3.jpg" class="img-fluid" style="border-radius: 500px" alt="avt3">
     <h4 class="card-title">Dany</h4>
     <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo. sit amet, consectetur adipisicing elit</p>
          </div>
     </div>
    </div>
    <div class="col-lg-3 col-sm-5">
     <div class="card shadow-lg mb-3">
       <div class="card-body text-center">
     <img src="image/avtar4.jpg" class="img-fluid" style="border-radius: 500px" alt="avt4">
     <h4 class="card-title">Rahul Singh</h4>
     <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo.</p>
          </div>
     </div>
    </div>
  </div>
</div>
</div>
<!--- End Happy Coustmer Section-->

<!---Start Contact Form  Section-->
<div class="container" id="contact">
  <h2 class="text-center mb-4">Contact Us</h2>
   <div class="row">
     <!---Start Contact Form  Section 1-->
     <?php include('contact.php') ?>
     <!---End Contact Form  Section 1-->
     <div class="col-md-4 text-center">
      <strong>Headquarter:</strong><br>
      OSMS pvt Ltd,<br>
      Patia Road,KP-6 Bhubaneswar <br>
      Orrisa,751024 <br>
      Phone :- 9462491973 <br>
      <a href="#" target="_blank">www.osms.com</a><br>
      <br> <br>
      <strong>Branch:</strong><br>
      OSMS pvt Ltd,<br>
      Ashok Nager,Ranchi<br>
      Jharkhand,752224 <br>
      Phone :- 9463455553 <br>
      <a href="#" target="_blank">www.osms.com</a><br>
     </div>
   </div>
</div>
<!---End Contact Form  Section-->
<!---Start Footer Section-->
<footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6"> <!-- Start 1st column -->
                    <span class="pr-2">Follow us:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-linkedin"></i></a>
                </div> <!-- End 1st column -->
                <div class="col-md-6 text-right"> <!-- Start 2nd column -->
                    <small>Designed by ShriramGroups &copy; 2020 </small>
                    <small class="ml-2"><a class="text-danger "href="admin/login.php">Admin Login</a></small>
                </div> <!-- End 2nd column -->
            </div>
        </div>
    </footer>
<!---End Footer Section-->
  <!--Javascript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  </body>
</html>
