<?php
session_start();
if(empty($_SESSION['pname'])){
  header('location:sign_in_patient.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">chander@gmail.com</a>
        <i class="bi bi-phone"></i> +9236464748362
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">CARE Group</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a class="nav-link scrollto active" href="patient.php">Home</a></li>
          <li><a class="nav-link scrollto" href="patient.php">Diseases</a></li>
          <li><a class="nav-link scrollto" href="patient.php">Doctors</a></li>
          <li><a class="nav-link scrollto " href="patient.php" >Contact</a></li>
          <div class="mx-3">
            <form action="" method="post" class="upper_form">
              <input type="text" class="form-control py-1 px-1" name="data" placeholder="Search your specialist...">
               <a href=""><input type="submit"  name="search" class="btn btn-primary py-1 px-3 text-white" value="search" id=""></a>
            </form>
            
          </div></ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">
<div class="container doctor-heading"></div>

        <div class="row">
        <?php
      include("connect.php");

      if(isset($_POST['search'])){
        $data = $_POST['data'];
        $sel = "SELECT *FROM `administrator` WHERE name='$data' OR works2='$data' OR city='$data'";
        $result = mysqli_query($conn, $sel);

      while($row= mysqli_fetch_array($result)){
        ?>

          <div class="col-lg-4 col-md-6">
            <div class="member d-flex align-items-center">
              <div class="pic rounded-3 mb-3" style="overflow:visible;"><img src="<?=$row['image'];?>"  width="250px" height="180px" alt=""></div>
              <div class="member-info text-center">
                <a href="">
                <h4><?=$row['name']?></h4></a>
                <span><?=$row['works2']?></span>
                <p>Location: <?=$row['city']?></p>

                <p><?=$row['para']?></p>
                <a href="getappointment.php?id=<?=$row['id'];?>" class="btn btn-primary mt-3">View Details</a>
              </div>
            </div>
          </div>
          
        <?php
      }

    }


    else{

      $sel = "SELECT *FROM `administrator`";
      $result = mysqli_query($conn, $sel);

      
      while ($row = mysqli_fetch_array($result)) {
?>
        <div class="col-lg-4 col-md-6">
        <div class="member d-flex align-items-center">
          <div class="pic rounded-3  mb-3" style="overflow:visible;"><img src="<?=$row['image']?>"  width="250px" height="180px" alt=""></div>
          <div class="member-info  text-center">
            <a href="sign_in_patient.php">
            <h4><?=$row['name']?></h4></a>
            <span><?=$row['works2']?></span>
            <p>Location: <?=$row['city']?></p>

            <p><?=$row['para']?></p>
            <a href="getappointment.php?id=<?=$row['id'];?>" class="btn btn-primary mt-3">View Details</a>
          </div>
        </div>
      </div>



      <?php
      }
    }


?>
        </div>

      </div>
    </section><!-- End Doctors Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>CARE Group</h3>
            <p>
              aptech latifabad, near the rooftop latifaad, hyderabad sindh pakistan<br><br>
              <strong>Phone:</strong> +9236464748362<br>
              <strong>Email:</strong> chander@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>CARE Group</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Chander Raja</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>