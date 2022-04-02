<?php
require_once('/home/arslane/www-prj/projetweb-1/controllers/check-session.php');
if (!(has_admin_access_level() || has_pilot_access_level() || (has_representative_access_level('sfx3') && has_representative_access_level('sfx4') && has_representative_access_level('sfx5') && has_representative_access_level('sfx6')))) {
  echo "Access Denied.";
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Students</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<link href="/views/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="/views/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/views/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/views/assets/css/style.css" rel="stylesheet">
  <script src="/views/assets/vendor/aos/aos.js"></script>
  <script src="/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/views/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/views/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/views/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/views/assets/vendor/php-email-form/validate.js"></script>
  <script src="/views/assets/js/main.js"></script>
  <script src="/views/assets/scripts/functions.js"></script>
  <link rel="icon" href="https://img.icons8.com/external-smashingstocks-isometric-smashing-stocks/55/000000/external-web-link-seo-and-marketing-smashingstocks-isometric-smashing-stocks.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
        #overlay {
            position: fixed;
            /* Sit on top of the page content */
            display: none;
            /* Hidden by default */
            width: 100%;
            /* Full width (cover the whole page) */
            height: 100%;
            /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with opacity */
            z-index: 1000;
            /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer;
            /* Add a pointer on hover */
        }

        #stat-card {
            margin: 100px 25%;
            width: 50%;
            background-color: white;
            border-radius: 18.5px;
            padding: 20px;
        }

        @media screen and (max-width: 800px) {
            #stat-card {
                width: 90%;
                margin: 0 5%;                
                height: max-content;
            }
        }
    </style>
</head>
<body>
<header >
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="home.php"><span>STUDENTS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/views/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#offers">Offers</a></li>
          <li><a class="nav-link scrollto" href="#companies">Companies</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Interns</a></li>
        
          <li><a class="getstarted scrollto" href="./login.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <main>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>FirstName</th>
                <th>ID Promotion</th>
                <th>Login</th>
                <th>Password</th> 
                <th>Id Center</th> 
                <th></th>
                <th></th>
            </tr>
            <tr>
              <form>
                <th> <input size="5" id="id_user" type="text" name="id_user"></th>
                <th><input size="15" id="lastname" type="text" name="lastname"></th>
                <th><input size="15" id="firstname" type="text" name="firstname"></th>
                <th><select name="id_prom" id="id_prom">
                  <option value="1">A2 2022</option>
                </select></th> 
                <th><input size="10" id="login" type="text" name="login"></th>
                <th><input size="10" id="password" type="text" name="password"></th>
                <th><select name="id_center" id="id_center">
                  <option value="1">Exia Alger</option>
                  <option value="2">CESI EXIA Alger</option>
                  <option value="3">CESI lyon</option>
                  <option value="4">CESI Springfield</option>
                  <option value="5">CESI South Park</option>
                  <option value="6">CESI New York</option>
                  <option value="7">CESI Gotham City</option>
                  <option value="8">CESI Metropolis</option>
                  <option value="9">CESI Tokyo</option>
                  <option value="10">CESI Moscou</option>
                  <option value="11">CESI Sin City</option>
                </select></th> 
                <th><button class="btn btn-primary" type="button" id="create">Add</button></th>
                <th><button class="btn btn-info" type="button" id="update">Download</button></th>
              </form>
            </tr>
        </thead>
        <tbody>
          
             
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>FirstName</th>
                <th>ID Promotion</th>
                <th>Login</th>
                <th>Password</th> 
                <th>Id Center</th> 
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</main>
<footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Telhaguhoum Inc</h3>
            <p>
             Je m'en fou <br>
              Birkhadem<br>
              United Tixeraines <br><br>
              <strong>Phone:</strong> +213 550 214 991<br>
              <strong>Email:</strong> amine.adoul.dz@viacesi.fr<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
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

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Je rigole khatina les reseaux</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
      
      </div>
      <div class="credits">
        
        Designed by <a href="#">Tonton</a>
      </div>
    </div>
  </footer>
  <div id="overlay">


  </div>
  <script>
    document.body.onload = () => {
      student();
      searchStudentsAdmin('', 1);
      document.getElementById('id_user').oninput = () => getStudentAdmin(document.getElementById('id_user').value);
    }
  </script>
</body>
</html>