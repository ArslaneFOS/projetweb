<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Offers</title>
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
  <link rel="icon" href="https://img.icons8.com/external-smashingstocks-isometric-smashing-stocks/55/000000/external-web-link-seo-and-marketing-smashingstocks-isometric-smashing-stocks.png">
</head>
<body>
<header >
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="home.php"><span>OFFERS</span></a></h1>
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
                <th>Name</th>
                <th>Level</th>
                <th>duration</th>
                <th>Pay(Euro/h)</th> 
                <th>Date Posted</th> 
                <th>Places</th> 
                <th>Description</th> 
                <th>Id Company</th> 
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th> <input size="5" id="input" type="text" name="ID"></th>
                <th><input size="15" id="Description" type="text" name="Name"></th>
                <th><input size="5" list="Level"><datalist id="Level"><option value="A1"><option value="A2"><option value="A3"><option value="A4"><option value="A5"></datalist></th> 
                <th><input size="5" list="Duration"><datalist id="Duration"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"><option value="6"><option value="7"><option value="8"><option value="9"><option value="10"><option value="11"><option value="12"></datalist></th>
                <th><input type="number" id="pay" name="pay" min="12" max="150"></th>
                <th><input id="date posted" type="date" value="2022-04-01"></th>
                <th><input size="5" list="Places"><datalist id="Places"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"></datalist></th> 
                <th><input size="25" id="Description" type="text" name="Description"></th>
                <th><input size="5" list="Id Center"><datalist id="Id Center"><option value="1"><option value="2"><option value="3"><option value="4"><option value="5"></datalist></th> 
                <th><button type="button">Add</button></th>
                <th><button type="button">Download</button></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mobile Dev</td>
                <td>A2</td>
                <td>3</td>
                <td>23€</td>
                <td>2015-10-21</td>
                <td>4</td>
                <td>Best Company In The World</td>
                <td>17</td>
                <td><button type="button">Delete</button></td>
                <td><button type="button">Upload</button></td>
            </tr>

        </tbody>
        <tfoot>
           <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Level</th>
                <th>duration</th>
                <th>Pay(Euro/h)</th> 
                <th>Date Posted</th> 
                <th>Places</th> 
                <th>Description</th> 
                <th>Id Company</th> 
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
</body>
</html>